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
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $publisher;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $genre;

    /**
     * @ORM\Column(type="integer")
     */
    private int $length;

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
	public function getLength(): int
	{
		return $this->length;
	}

	/**
	 * @param int $length
	 */
	public function setLength(int $length): void
	{
		$this->length = $length;
	}
}
