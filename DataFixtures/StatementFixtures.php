<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\DataFixtures;

use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Result;
use Xabbuh\XApi\Model\Score;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\StatementReference;
use Xabbuh\XApi\Model\Verb;

/**
 * Statement fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementFixtures
{
    /**
     * Loads a minimal valid statement.
     *
     * @return Statement
     */
    public static function getMinimalStatement()
    {
        $statement = new Statement();
        $statement->setId('12345678-1234-5678-8234-567812345678');

        $actor = new Agent();
        $actor->setMbox('mailto:xapi@adlnet.gov');
        $statement->setActor($actor);

        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/created');
        $verb->setDisplay(array('en-US' => 'created'));
        $statement->setVerb($verb);

        $activity = new Activity();
        $activity->setId('http://example.adlnet.gov/xapi/example/activity');
        $statement->setObject($activity);

        return $statement;
    }

    /**
     * Loads a statement including a reference to another statement.
     *
     * @return Statement
     */
    public static function getStatementWithStatementRef()
    {
        $statementReference = new StatementReference();
        $statementReference->setStatementId('8f87ccde-bb56-4c2e-ab83-44982ef22df0');

        $statement = static::getMinimalStatement();
        $statement->setObject($statementReference);

        return $statement;
    }

    /**
     * Loads a statement including a result.
     *
     * @return Statement
     */
    public static function getStatementWithResult()
    {
        $score = new Score();
        $score->setScaled(0.95);
        $score->setRaw(31);
        $score->setMin(0);
        $score->setMax(50);
        $result = new Result();
        $result->setScore($score);
        $result->setSuccess(true);
        $result->setCompletion(true);

        $statement = static::getMinimalStatement();
        $statement->setResult($result);

        return $statement;
    }
}
