<?php
return [
    'admin' => [
        'title' => 'Product',
        'list' => [
            'title' => 'List Products'
        ],
        'table' => [
            'id' => 'ID',
            'image' => 'Image',
            'name' => 'Name',
            'manufacturing_date' => 'Manufacturing Date',
            'price' => 'Price',
            'producer' => 'Producer',
            'detail' => 'Detail',
            'description' => 'Description',
            'category_id' => 'Category Id',
            'created_at' => 'Created At',
            'updated_at' => 'Update At',
            'deleted_at' => 'Delete At',
            'color' => 'Color Product',
            'path_image' => 'Image',
            'quatity' => 'Quantity',
            'price_color_value' => 'Price Color Value',
            'price_color_type' => 'Price Color Type',
            'action' => 'Action'
        ],
        'add' => [
            'title' => 'Add Product',
            
        ],
        'edit' => [
            'title' => 'Edit Product',
        ],
        'show' => [
            'title' => 'Show Detail Product',
        ],
        'button' => [
            'submit' => 'Submit',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel'
        ],
        'message' => [
            'add' => 'Create New Category Successfull!',
            'unique_name' => 'Can not add New Category. Name category can exist in database. Please check name category!',
            'add_fail' => 'Can not Create New Category. Please check connect database!',
            'edit' => 'Update Category Successfull!',
            'edit_fail' => 'Can not edit Category by this Child!',
            'del' => 'Delete Category Successfull!',
            'del_fail' => 'Can not Delete Category. Please check foreign key with product!',
            'msg_del' => 'Do you want to delete this Product?'
        ]
    
    ]
];
