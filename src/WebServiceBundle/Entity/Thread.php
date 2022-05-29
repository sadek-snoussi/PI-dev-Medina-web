<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thread
 *
 * @ORM\Table(name="thread")
 * @ORM\Entity
 */
class Thread
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="permalink", type="string", length=255, nullable=false)
     */
    private $permalink;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_commentable", type="boolean", nullable=false)
     */
    private $isCommentable;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_comments", type="integer", nullable=false)
     */
    private $numComments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_comment_at", type="datetime", nullable=true)
     */
    private $lastCommentAt;


}

