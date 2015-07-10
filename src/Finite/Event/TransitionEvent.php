<?php

namespace Finite\Event;

use Finite\State\StateInterface;
use Finite\StateMachine\StateMachine;
use Finite\Transition\TransitionInterface;

/**
 * The event object which is thrown on transitions actions
 *
 * @author Yohan Giarelli <yohan@frequence-web.fr>
 */
class TransitionEvent extends StateMachineEvent
{
    /**
     * @var TransitionInterface
     */
    protected $transition;

    /**
     * @var boolean
     */
    protected $transitionRejected = false;

    /**
     * @var StateInterface
     */
    protected $initialState;

    /**
     * @var mixed
     */
    protected $payload;

    /**
     * @param StateInterface      $initialState
     * @param TransitionInterface $transition
     * @param StateMachine        $stateMachine
     * @param mixed               $payload
     */
    public function __construct(StateInterface $initialState, TransitionInterface $transition, StateMachine $stateMachine, $payload = null)
    {
        $this->transition   = $transition;
        $this->initialState = $initialState;
        $this->payload      = $payload;

        parent::__construct($stateMachine);
    }

    /**
     * @return TransitionInterface
     */
    public function getTransition()
    {
        return $this->transition;
    }

    /**
     * @return bool
     */
    public function isRejected()
    {
        return $this->transitionRejected;
    }

    public function reject()
    {
        $this->transitionRejected = true;
    }

    /**
     * @return StateInterface
     */
    public function getInitialState()
    {
        return $this->initialState;
    }

    public function getPayload()
    {
        return $this->payload;
    }
}
