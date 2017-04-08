<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScheduledCommand
 *
 * @ORM\Table(name="SCHEDULED_COMMAND")
 * @ORM\Entity
 */
class ScheduledCommand
{
    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="COMMAND", type="string", length=100, nullable=false)
     */
    private $command;

    /**
     * @var string
     *
     * @ORM\Column(name="ARGUMENTS", type="string", length=250, nullable=true)
     */
    private $arguments;

    /**
     * @var string
     *
     * @ORM\Column(name="CRON_EXPRESSION", type="string", length=100, nullable=true)
     */
    private $cronExpression;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DH_LAST_EXECUTION", type="datetime", nullable=false)
     */
    private $dhLastExecution;

    /**
     * @var integer
     *
     * @ORM\Column(name="LAST_RETURN_CODE", type="integer", nullable=true)
     */
    private $lastReturnCode;

    /**
     * @var string
     *
     * @ORM\Column(name="LOG_FILE", type="string", length=100, nullable=true)
     */
    private $logFile;

    /**
     * @var integer
     *
     * @ORM\Column(name="PRIORITY", type="integer", nullable=false)
     */
    private $priority;

    /**
     * @var boolean
     *
     * @ORM\Column(name="B_EXECUTE_IMMEDIATELY", type="boolean", nullable=false)
     */
    private $bExecuteImmediately;

    /**
     * @var boolean
     *
     * @ORM\Column(name="B_DISABLED", type="boolean", nullable=false)
     */
    private $bDisabled;

    /**
     * @var boolean
     *
     * @ORM\Column(name="B_LOCKED", type="boolean", nullable=false)
     */
    private $bLocked;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_SCHEDULED_COMMAND", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idScheduledCommand;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return ScheduledCommand
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set command
     *
     * @param string $command
     *
     * @return ScheduledCommand
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set arguments
     *
     * @param string $arguments
     *
     * @return ScheduledCommand
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * Get arguments
     *
     * @return string
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Set cronExpression
     *
     * @param string $cronExpression
     *
     * @return ScheduledCommand
     */
    public function setCronExpression($cronExpression)
    {
        $this->cronExpression = $cronExpression;

        return $this;
    }

    /**
     * Get cronExpression
     *
     * @return string
     */
    public function getCronExpression()
    {
        return $this->cronExpression;
    }

    /**
     * Set dhLastExecution
     *
     * @param \DateTime $dhLastExecution
     *
     * @return ScheduledCommand
     */
    public function setDhLastExecution($dhLastExecution)
    {
        $this->dhLastExecution = $dhLastExecution;

        return $this;
    }

    /**
     * Get dhLastExecution
     *
     * @return \DateTime
     */
    public function getDhLastExecution()
    {
        return $this->dhLastExecution;
    }

    /**
     * Set lastReturnCode
     *
     * @param integer $lastReturnCode
     *
     * @return ScheduledCommand
     */
    public function setLastReturnCode($lastReturnCode)
    {
        $this->lastReturnCode = $lastReturnCode;

        return $this;
    }

    /**
     * Get lastReturnCode
     *
     * @return integer
     */
    public function getLastReturnCode()
    {
        return $this->lastReturnCode;
    }

    /**
     * Set logFile
     *
     * @param string $logFile
     *
     * @return ScheduledCommand
     */
    public function setLogFile($logFile)
    {
        $this->logFile = $logFile;

        return $this;
    }

    /**
     * Get logFile
     *
     * @return string
     */
    public function getLogFile()
    {
        return $this->logFile;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return ScheduledCommand
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set bExecuteImmediately
     *
     * @param boolean $bExecuteImmediately
     *
     * @return ScheduledCommand
     */
    public function setBExecuteImmediately($bExecuteImmediately)
    {
        $this->bExecuteImmediately = $bExecuteImmediately;

        return $this;
    }

    /**
     * Get bExecuteImmediately
     *
     * @return boolean
     */
    public function getBExecuteImmediately()
    {
        return $this->bExecuteImmediately;
    }

    /**
     * Set bDisabled
     *
     * @param boolean $bDisabled
     *
     * @return ScheduledCommand
     */
    public function setBDisabled($bDisabled)
    {
        $this->bDisabled = $bDisabled;

        return $this;
    }

    /**
     * Get bDisabled
     *
     * @return boolean
     */
    public function getBDisabled()
    {
        return $this->bDisabled;
    }

    /**
     * Set bLocked
     *
     * @param boolean $bLocked
     *
     * @return ScheduledCommand
     */
    public function setBLocked($bLocked)
    {
        $this->bLocked = $bLocked;

        return $this;
    }

    /**
     * Get bLocked
     *
     * @return boolean
     */
    public function getBLocked()
    {
        return $this->bLocked;
    }

    /**
     * Get idScheduledCommand
     *
     * @return integer
     */
    public function getIdScheduledCommand()
    {
        return $this->idScheduledCommand;
    }
}
