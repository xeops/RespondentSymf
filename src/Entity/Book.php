<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 * @ORM\Table(indexes={
 *      @ORM\Index(name="search", columns={})
 *
 * })
 */
class Book
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private int $id;

	/**
	 * Имя книги
	 * @ORM\Column(type="string", length=255)
	 */
	private string $name;

	/**
	 * Автор
	 * @ORM\Column(type="string", length=255)
	 */
	private string $author;

	/**
	 * Издатель
	 * @ORM\Column(type="string", length=255)
	 */
	private string $publisher;

	/**
	 * Жанр
	 * @ORM\Column(type="string", length=255)
	 */
	private string $genre;

	/**
	 * Кол-во страниц
	 * @ORM\Column(type="integer")
	 */
	private int $pages;

	/**
	 * Кол-во на полках
	 * @ORM\Column(type="integer")
	 */
	private int $countInStock;

	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getAuthor(): string
	{
		return $this->author;
	}

	/**
	 * @param string $author
	 */
	public function setAuthor(string $author): void
	{
		$this->author = $author;
	}

	/**
	 * @return string
	 */
	public function getPublisher(): string
	{
		return $this->publisher;
	}

	/**
	 * @param string $publisher
	 */
	public function setPublisher(string $publisher): void
	{
		$this->publisher = $publisher;
	}

	/**
	 * @return string
	 */
	public function getGenre(): string
	{
		return $this->genre;
	}

	/**
	 * @param string $genre
	 */
	public function setGenre(string $genre): void
	{
		$this->genre = $genre;
	}

	/**
	 * @return int
	 */
	public function getPages(): int
	{
		return $this->pages;
	}

	/**
	 * @param int $pages
	 */
	public function setPages(int $pages): void
	{
		$this->pages = $pages;
	}

	/**
	 * @return int
	 */
	public function getCountInStock(): int
	{
		return $this->countInStock;
	}

	/**
	 * @param int $countInStock
	 */
	public function setCountInStock(int $countInStock): void
	{
		$this->countInStock = $countInStock;
	}


}
