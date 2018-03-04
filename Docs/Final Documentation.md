# Final Documentation
> ISCG 7420 Assignment 2  
> Owner: Chunkai Meng  
> Student ID: 1494933  
> Declaration: This submission is my own work, except for use of resources supplied with the course, information from the public domain where clearly referenced”


## Critique - Comparison between PHP and ASP.NET Core
### Database techniques  
ASP.Net and PHP both have rich API for database. However, when developing a Web application with ASP.net MS SQL Server is most preferred. When with PHP, MySQL Server is most preferred. PHP provide APIs to connect to MySQL: mysqli and PDO extension, here in this project, mysqli is used as it supplied with the course, the frequently used functions are:
- To excuse the query: `mysqli_query()`
- Storing the data in the numeric indices of the result array `mysqli_fetch_row()`
- Count the number of records `mysqli_num_rows()`
- Using the field names of the result set as keys. `mysqli_fetch_array() `

For ASP.net Core
We use Entity Framework to access database. "Entity Framework (EF) is an object-relational mapper that enables .NET developers to work with relational data using domain-specific objects. It eliminates the need for most of the data-access code that developers usually need to write." [[1]](https://msdn.microsoft.com/en-us/library/aa937723.aspx) Since I didn't employ any framework in this project, so I have to do everything that EF did.

### Code Sharing and Reuse  
**PHP VS ASP.Net Core**
- In **PHP** the most popular techniques I use is `require` and `require_once`, `require_once` can eliminate loading duplicate files.
    - DB connect String and GST rate are shared within the db_connection.php. (maybe 'appsetting.php' is a better name for it)
    - `Views\Shared\CheckLogin.php` `Views\Shared\AuthorizeAdmin` are shared and load by the corresponding Controller Method to implement Access Control. By this way I can differentiate guest/menber/admin.
    -

- Beside, I use MVC pattern to organize all pages, so at least some View page e.g. index.php, create.php can be easily share or reuse after a small change.

### client techniques  
- **Bootstarp**:  
  No matter PHP or ASP.Net I use Bootstrap to help render a beautiful enough page, the more important thing is that I can let Bootstrap to worry about supporting different size screen.
- **Passing Parameters to HTML and HTML Flow Control**  
  - **ASP.Net:**   
    - we can pass a model or models from Controllers to Views.
    - `ViewBag.foo`, `ViewData["foo"]` are used to pass parameters from views to views.
    - **Razor** code are used to disassemble the model or parameters sent from controller and render them in the right place.
    - **Razor** can perform simple calculation and flow control (e.g. render a table with multiple rows.).
    - **HTML Helper** is a very efficient way to represent data and collect data via the same snippet of code.

  - **PHP:**  
    - I just use PHP code in both server side as well as client side.
    - In controller I put everything the View need in the variables, then require that corresponding view. In the View PHP code can use these variables directly.
    - variable can be use in HTML tag such as `echo "<td>$name</td>";` or `<td><?php echo $name; ?></td>`
    - `if/while/switch/foreach` etc are provided in PHP to help build a dynamic web application.


### **Software architecture and etc.**  
- **Open Source:**  
Both ASP.Net Core and PHP are open source, many developers had supplied excellent frameworks or packages to help people make their job easier.

- **Strongly Type VS Weekly Type**  
**ASP.Net Core** use C# which is strongly type language, people need to define or initiate (so compile can infer its type) it before using it.  
While in **PHP** you do not have to do that. I prefer strongly type language more because it's safer and less unexpected error. And sometimes can make your code more clear.

- **Compile and interpreted Language**  
C# as a compile language, people need to compile and rebuild the **ASP.Net Core** project to make the new code take effect.  
In php you can just refresh you browser to see the new effect.

- **async/await**  
**ASP.Net Core** provide asynchronous programming support.
while in PHP I did not see that may be need to include some particular package.


Your report needs to demonstrate an in depth understanding of web application development using both ASP.NET Core and PHP.

- Clear discussions on database techniques, code sharing/reuse, client techniques and software architecture for both tools (ASP.NET Core and PHP).
- Demonstrated understanding of ASP.NET Core and PHP as well as the advantages and disadvantages of both.
- A discussion on the following:
o If you were given the choice for this assignment, which product would you use, and why?
- Referencing
