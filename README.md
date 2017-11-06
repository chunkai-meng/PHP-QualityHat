**Change ShoppingCart Model**
**Empty Shopping Cart**
**Decrease Shopping Item**

**Create OrderDetail**
**Create Order**
- Get User ID
    - Add `$_SESSION['current_userid']` : Done
- Get the other values of Order
    - upgrade ShoppingCart Components Default View: So it can post values of both Order and items; Done
    - Get all this value post from Shopping Cart Default and show in OrderController->create_POST(); Done

- Insert Order and Item values into DB
    - INSERT a Order model; Done
    - PASS this OrderID to every OrderDetail model and INSERT to DB; Done
- Order index(Action & View)
    - Need order info(phone & address) from users: Pending
    - Upgrade Register View: Done
    -
