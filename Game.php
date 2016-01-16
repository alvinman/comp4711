<?php

/**
 * Created by PhpStorm.
 * User: Alvin Man
 * Student ID: A00776103
 * Set: 4O
 * Date: 1/12/2016
 * Time: 4:59 PM
 */
class Game
{
    var $position;

    function __construct($squares){
        $this->position = str_split($squares);

        if($this->winner('x')) {
            echo "<p> You win. Lucky guesses! </p>";
        } else if ($this->winner('o')) {
            echo "<p> I win.  Muhahahahahaha </p>";
        } else {
            $this->pick_move();
            if($this->winner('o')){
                echo "<p> I win.  Muhahahahahaha </p>";
            }
        }
        $this->display();
    }

    //Function to determine whether x or o won
    function winner($token){
        $result = false;

        //horizontal
        for($row=0; $row<3; $row++){
            if(($this->position[3*$row] == $token) &&
                ($this->position[3*$row+1] == $token) &&
                ($this->position[3*$row+2] == $token)){
                $result = true;
            }
        }

        //vertical
        for($col=0; $col<3; $col++){
            if(($this->position[$col] == $token) &&
                ($this->position[$col+3] == $token) &&
                ($this->position[$col+6] == $token)){
                $result = true;
            }
        }

        //diagonals
        if($this->position[0] == $token &&
            $this->position[4] == $token &&
            $this->position[8] == $token){
            $result = true;
        }

        if($this->position[2] == $token &&
            $this->position[4] == $token &&
            $this->position[6] == $token){
            $result = true;
        }

        return $result;
    }

    //Function to display the current gameboard
    function display(){
        echo '<table id="table">';
        echo '<tr>'; // open the first row
        for ($pos = 0; $pos < 9; $pos++){
            echo $this->show_cell($pos);
            if($pos %3 == 2) echo '</tr><tr>'; //start a new row for the next square
        }
        echo '</tr>'; //close the last row
        echo '</table>';
    }

    //Helper function for displaying the game board, showing the cell contents
    function show_cell($which){
        $token = $this->position[$which];
        //deal with the easy case
        if($token<>'-')
            return '<td>'.$token.'</td>';
        //hard case
        $this->newposition = $this->position; //copy original
        $this->newposition[$which] = 'x'; //their move
        $move = implode($this->newposition); //make a string from the board array

        if($this->winner('o') || $this->winner('x')){
            return '<td id="white">.</td>';
        }

        $link = '?board='.$move;
        return '<td><a href="'.$link.'">.</a></td>';
    }

    //Automatically picks a move by selecting the next available cell
    function pick_move(){
        for($pos = 0; $pos < 9; $pos++){
            if($this->position[$pos] == '-'){
                $this->position[$pos] = 'o';
                break;
            }
        }
    }

}