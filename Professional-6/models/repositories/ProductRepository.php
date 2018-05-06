<?php

namespace sukhinin\app\models\repositories;

/**
 * Description of ProductRepository
 *
 * @author Lex
 */
class ProductRepository extends \sukhinin\app\models\Repository {
    
    public function getTableName() {
        return 'products';
    }
    
    public function getEntityClass() {
        return \sukhinin\app\models\Product::class;
    }
}
