<h2>Add product</h2>
<form method="post">

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <label>
            <td><input type='text' name='name' class='form-control' required="required" /></td>
            </label>
        </tr>

        <tr>

            <td>Price</td>
            <label>
            <td><input type='text' name='price' class='form-control' required="required" /></td>
            </label>
        </tr>

        <tr>
            <label>
            <td>Description</td>
            <td><textarea name='description' class='form-control' required="required"></textarea></td>
            </label>
        </tr>


        <tr>
            <td></td>
            <td>
                <input type="submit" name="add" value="Add Product">

            </td>
        </tr>

    </table>
</form>

Go to products <a href="allProducts.php">All products</a>
