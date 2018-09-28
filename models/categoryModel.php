<?php

    // include('database.php');

    class CategoryModel extends Database
    {
        public function getCategories()
        {
            $sql = "SELECT * FROM categories";
            return mysqli_query($this->conn, $sql);
        }

        public function get_category_name($category_id)
        {
            $sql = "SELECT * FROM categories WHERE id = $category_id";
            $result = mysqli_query($this->conn, $sql);
            $category = mysqli_fetch_array($result);
            $category_name = $category['cat_name'];
            return $category_name;
        }

        public function insertCategory($catName)
        {
            $sql = "INSERT INTO categories (cat_name) 
            VALUES ('$catName')";
            $result = mysqli_query($this->conn,$sql);
        }
    }
