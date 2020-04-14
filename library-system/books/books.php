<?php

declare(strict_types=1);

namespace library_system\books;

class Books implements BooksInterface
{
    private $bookTitle;
    private $authorName;

    public function __construct(Title $bookTitle, AuthorName $authorName)
    {
        $this->bookTitle = $bookTitle->value();
        $this->authorName = $authorName->value();
    }

    /**
     * @return mixed
     */
    public function title(): string
    {
        return $this->bookTitle;
    }

    /**
     * @return mixed
     */
    public function author(): string
    {
        return $this->authorName;
    }
}
