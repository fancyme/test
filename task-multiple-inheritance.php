<?php

/**
 * Multiple inheritance in PHP
 *
 * Problem: in our class hierarchy we have implementation of a method that we
 * would like to re-use in another class, that does not belong to that
 * hierarchy and we can't extend one class from another, what other options do
 * we have here?
 *
 * Given abstraction is not fully correct from biological point of view,
 * but it should represent the problem of multiple-inheritance quite well.
 * Please accept and follow the suggested abstraction and stick to common
 * sense understanding of animals, humans and machines.
 *
 * You are free to adjust all classes and also define new ones, as long as
 * public interfaces of the classes that are provided in the original task
 * description stay as they are.
 *
 * For the sake of simplicity all classes and interfaces are described within
 * one file, i.e. this file, please keep all changes within this file.
 */

interface IsWalking
{
    public function walk();
}

abstract class Mammal implements IsWalking
{
    protected $heart;
    protected $bloodVesselSystem;
    //...
    abstract public function walk()
    {
    }
}

class Human extends Mammal implements IsWalking
{
    // ...
    private $muscleQuadriceps;
    private $muscleLegBiceps;
    // ...
    public function walk()
    {
        while (/* target is not reached */) {
            /* implementation for the sake of example */
            $this->muscleQuadriceps->contract();
            sleep(500);
            $this->muscleQuadriceps->relax();
            $this->muscleLegBiceps->contract();
            sleep(500);
            $this->muscleLegBiceps->relax();
        }
    }
}

abstract class Machine
{
    protected $energySource;
    protected $energyTransportSystem;
    // ...
}

class HumanoidRobot extends Machine implements IsWalking
{
    // ...
    private $muscleQuadriceps;
    private $muscleLegBiceps;
    // ...
    public function walk()
    {
        /**
         * TODO: humanoid robot is supposed to walk like Human.
         * for the sake of simplicity let's assume that in our case it means
         * that the code of the HumanoidRobot::walk() method should be the same
         * as Human::walk() method.
         *
         * What kind of class hierarchy/structure should we implement here to
         * avoid duplication of the walk() method implementation between
         * Human::walk() and HumanoidRobot::walk()
         *
         * You are allowed to refactor implementation of all classes presented
         * here as long as they stay compatible with any code that might be
         * using them now. In other words: public interfaces of all classes
         * should stay like they are now, implementation details may be changed
         * without any limitation.
         */
    }
}

/**
 * Possibly more illustrative visual representation of the problem:
 *
 *
 *                         |====================|
 *                         |INTERFACE: IsWalking|
 *                         |====================|
 *                        /| walk()             |
 *                       / |====================|
 *                      /     /            \
 *             |--------|    /              \    |---------------|
 *             | Mammal |   /                \   |    Machine    |
 *             |--------|  /                  \  |---------------|
 *               |  |     /                    \         |   |
 *       /-------/  |    /                      \        |   \----------\
 *       |          |   /                        \       |              |
 *  |--------|   |--------|                       |---------------|   |-------|
 *  | Dog    |   | Human  |                       | HumanoidRobot |   | Drill |
 *  |--------|   |--------|                       |---------------|   |-------|
 *  | walk() |   | walk() |                       | walk()        |
 *  |--------|   |--------|                       |---------------|
 *
 * Dog::walk() will be a different implementation of the walk-method comparing
 * to the Human::walk(), at the same time HumanoidRobot::walk() is expected to
 * be exactly the same one as the Human::walk(). Drill has no walk() method.
 */