<?php
    echo "<form role='search' action='search.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
    $search_value = isset($search_term) ? "value='$search_term'" : "";
    echo "<input type='text' class='form-control' placeholder='Type product name or description...' name='s' id='srch-term' required $search_value />";
    echo "<div class='input-group-btn'>";
    echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
    echo "</div>";
    echo "</div>";
    echo "</form>";

    echo "<div class='right-button-margin'>";
    echo "<a href='create_product.php' class='btn btn-primary pull-right'>";
    echo "<span class='glyphicon glyphicon-plus'></span> Create Product";
    echo "</a>";
    echo "</div>";

    if($total_rows > 0){
        echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
        echo "<th>Product</th>";
        echo "<th>Price</th>";
        echo "<th>Description</th>";
        echo "<th>Category</th>";
        echo "<th>Actions</th>";
        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$price</td>";
            echo "<td>$description</td>";
            $category->id = $category_id;
            $category->readName();
            echo "<td>" . $category->name . "</td>";

            echo "<td>";

            echo "<a href='read_one.php?id=$id' class='btn btn-primary left-margin'>";
            echo "<span class='glyphicon glyphicon-list'></span> Read";
            echo "</a>";

            echo "<a href='update_product.php?id=$id' class='btn btn-info left-margin'>";
            echo "<span class='glyphicon glyphicon-edit'></span> Edit";
            echo "</a>";

            echo "<a delete-id='$id' class='btn btn-danger delete-object'>";
            echo "<span class='glyphicon glyphicon-remove'></span> Delete";
            echo "</a>";

            echo "</td>";

            echo "</tr>";

        }

        echo "</table>";

        include_once 'paging.php';
    }
    else
        echo "<div class='alert alert-danger'>No products found.</div>";
?>