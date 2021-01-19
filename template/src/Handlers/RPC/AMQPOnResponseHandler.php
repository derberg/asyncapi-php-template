<?php
/**
 * This class is used by a Producer as a means to implement business logic "OnResponse"
 * From any given RPC server (Worker)
 *
 * User: emiliano
 * Date: 30/12/20
 * Time: 11:03
 */

namespace {{ params.packageName }}\BrokerAPI\Handlers\RPC;

use {{ params.packageName }}\BrokerAPI\Messages\MessageContract;
use PhpAmqpLib\Message\AMQPMessage;

class AMQPOnResponseHandler extends RPCHandlerContract
{
    /**
     * @param AMQPMessage $message
     * @return bool
     */
    public function handle($message): bool
    {
        if ($message->get('correlation_id') == $this->getCorrelationId()) {
            $this->setMessage($message);
        }
        return true;
    }
}
