<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model;

/**
 * Result when querying a Learning Record Store (LRS) for a list of
 * {@link Statement Statements}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResult
{
    /**
     * @var Statement[] The collection of Statements
     */
    protected $statements;

    /**
     * @var string
     */
    protected $moreUrlPath;

    /**
     * Sets the result's Statements.
     *
     * @param Statement[] $statements The collection of Statements
     */
    public function setStatements(array $statements)
    {
        $this->statements = $statements;
    }

    /**
     * Returns the Statements.
     *
     * @return Statement[] The Statements
     */
    public function getStatements()
    {
        return $this->statements;
    }

    /**
     * Sets the absolute path under which the next results can be retrieved.
     *
     * @param string $urlPath The URL path
     */
    public function setMoreUrlPath($urlPath)
    {
        $this->moreUrlPath = $urlPath;
    }

    /**
     * Returns the absolute path under which the next results can be retrieved.
     *
     * @return string The URL path
     */
    public function getMoreUrlPath()
    {
        return $this->moreUrlPath;
    }
}
