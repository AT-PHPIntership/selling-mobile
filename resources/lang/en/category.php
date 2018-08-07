<?php
return [
    'admin' => [
        'title' => 'Category',
        'list' => [
            'title' => 'List Categories'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'action' => 'Action',
        ],
        'add' => [
            'title' => 'Add Category',
            'name' => 'Name Category',
            'parent_category' => 'Parent Category',
            'submit' => 'Submit',
            'reset' => 'Reset',
            'back' => 'Back',
            'cancel' => 'Cancel',
            'placeholder_name' => 'Enter category name',
            'placeholder_parent_id' => 'Enter parent id',
            'placeholder_created_at' => 'Enter created at',
            'placeholder_updated_at' => 'Enter update at',
        ],
        'edit' => [
            'title' => 'Edit Category',
        ],
        'show' => [
            'title' => 'Show Category',
        ],
        'message' => [
            'add' => 'Create New Category Successfull!',
            'unique_name' => 'Can not add New Category. Name category can exist in database. Please check name category!',
            'add_fail' => 'Can not Create New Category. Please check connect database!',
            'edit' => 'Update Category Successfull!',
            'edit_fail' => 'Can not edit Category by this Child!',
            'del' => 'Delete Category Successfull!',
            'del_fail' => 'Can not Delete Category. Please check foreign key with product!',
            'msg_del' => 'Do you want to delete this Category?',
        ]
    
    ]
];
