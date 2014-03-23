<?php

/*
 * This file is part of the XabbuhXApiClient package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Client;

use Xabbuh\XApi\Common\Exception\ConflictException;
use Xabbuh\XApi\Common\Exception\NotFoundException;
use Xabbuh\XApi\Common\Exception\XApiException;
use Xabbuh\XApi\Common\Model\StatementInterface;

/**
 * An Experience API client.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface XApiClientInterface
{
    /**
     * Stores a single {@link \Xabbuh\XApi\Common\Model\StatementInterface Statement}.
     *
     * @param StatementInterface $statement The Statement to store
     *
     * @return string|null The id of the created statement or null if the Statement
     *                     being stored already had an id
     *
     * @throws ConflictException if a Statement with the given id already exists
     *                           and the given Statement does not match the
     *                           stored Statement
     * @throws XApiException     for all other xAPI related problems
     */
    public function storeStatement(StatementInterface $statement);

    /**
     * Retrieves a single {@link \Xabbuh\XApi\Common\Model\StatementInterface Statement}.
     *
     * @param string $statementId The Statement id
     *
     * @return StatementInterface The Statement
     *
     * @throws NotFoundException if no statement with the given id could be found
     * @throws XApiException     for all other xAPI related problems
     */
    public function getStatement($statementId);

    /**
     * Retrieves a collection of {@link \Xabbuh\XApi\Common\Model\StatementInterface Statements}.
     *
     * @return \Xabbuh\XApi\Common\Model\StatementResultInterface The {@link \Xabbuh\XApi\Common\Model\StatementResult}
     *
     * @throws XApiException in case of any problems related to the xAPI
     */
    public function getStatements();
}
