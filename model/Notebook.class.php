<?php
class Notebook
{
	private $id;
	private $name;
	private $title;
	private $content;
	private $time;
	
	public function getId()
    {
		return $this->id;
	}
	public function getName()
    {
		return $this->name;
	}
	public function getTitle()
    {
		return $this->title;
	}
	public function getContent()
    {
		return $this->content;
	}
	public function getTime()
    {
		return $this->time;
	}
	public function setId($id)
    {
		$this->id=$id;
	}
	public function setName($name)
    {
		$this->name=$name;
	}
	public function setTitle($title)
    {
		$this->title=$title;
	}
	public function setContent($content)
    {
		$this->content=$content;
	}
	public function setTime($time)
    {
		$this->time=$time;
	}
}
?>
