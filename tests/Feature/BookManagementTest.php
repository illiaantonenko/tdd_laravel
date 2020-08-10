<?php

namespace Tests\Feature;

use App\Author;
use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookManagementTest extends TestCase
{
  use RefreshDatabase;

  /**  @test */
  public function a_book_can_be_added_to_the_library()
  {
    $response = $this->post(route('book.store'), $this->data());

    $book = Book::first();

    $this->assertCount(1, Book::all());
    $response->assertRedirect($book->path());
  }

  /** @test */
  public function a_title_is_required()
  {
    $response = $this->post(route('book.store'), [
      'title' => '',
      'author' => 'Illia',
    ]);

    $response->assertSessionHasErrors('title');
  }

  /** @test */
  public function an_author_is_required()
  {
    $response = $this->post(route('book.store'), array_merge($this->data(), ['author_id' => '']));

    $response->assertSessionHasErrors('author_id');
  }

  /** @test */
  public function a_book_can_be_updated()
  {
    $this->post(route('book.store'), $this->data());

    $book = Book::first();

    $response = $this->patch($book->path(), [
      'title' => 'New Title',
      'author_id' => 'New Author',
    ]);
    $this->assertEquals('New Title', Book::first()->title);
    $this->assertEquals(2, Book::first()->author_id);
    $response->assertRedirect($book->fresh()->path());
  }

  /** @test */
  public function a_book_can_be_deleted()
  {
    $this->post(route('book.store'), $this->data());

    $book = Book::first();
    $this->assertCount(1, Book::all());

    $response = $this->delete($book->path());

    $this->assertCount(0, Book::all());

    $response->assertRedirect(route('book.index'));
  }

  /** @test */
  public function a_new_author_is_automatically_added()
  {
    $this->withoutExceptionHandling();

    $this->post(route('book.store'), [
      'title' => 'Cool Book Title',
      'author_id' => 'Illia',
    ]);
    $book = Book::first();
    $author = Author::first();

    $this->assertEquals($author->id, $book->author_id);
    $this->assertCount(1, Author::all());

  }

  /**
   * @return string[]
   */
  private function data(): array
  {
    return [
      'title' => 'Cool Book Title',
      'author_id' => 'Illia',
    ];
  }
}
