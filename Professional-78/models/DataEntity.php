<?php
namespace sukhinin\app\models;

/**
 * Description of Model
 *
 * @author Lex
 */
abstract class DataEntity extends Model {
    
    public $_existsInDb = false;
    public $_fields = [];
    
    
}
