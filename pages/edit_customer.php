<!-- add_edit_customer.html -->
<div class="container">
    <h2>Add/Edit Customer</h2>
    <form id="customerForm">
        <input type="hidden" id="customerId" name="customerId">
        <div class="form-group">
            <label for="customerName">Name</label>
            <input type="text" class="form-control" id="customerName" name="customerName" required>
        </div>
        <div class="form-group">
            <label for="customerEmail">Email</label>
            <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
        </div>
        <div class="form-group">
            <label for="customerPhone">Phone Number</label>
            <input type="text" class="form-control" id="customerPhone" name="customerPhone" required>
        </div>
        <div class="form-group">
            <label for="customerAddress">Address</label>
            <textarea class="form-control" id="customerAddress" name="customerAddress" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
