<?php

// categories , products 
// categories => id( 1,2,3,4), category name (c1,c2,c3,c4)
// products=> 1,2,3,4,5,6  
// p1,p2,p3,p4,p5,p6
// 2,3 ,  ,  1 , 1, 1
// SELECT categories.id, categories.category_name , COUNT(products_id) FROM categories LEFT JOIN products on 
// categories.id = products.categories_id GROUP BY(ID  , NAME);

?>