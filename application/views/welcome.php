<p align="center">
    AIRPORT API
    <br/>
    Author: Shahbaz
</p>
<p align="center">
    <a href="mailto:shahbazbsit16@gmail.com">shahbazbsit16@gmail.com</a>
    <br/>
    28-3-2016
</p>
<p>
    <br/>
    <br/>
    <u>
        RESPONSE in this API
        <br/>
    </u>
    Just include .JSON or .xml at the end of API call
    <br/>
    LIKE: <a href="http://localhost/airport/api/all.json">http://localhost/airport/api/all.json</a> will return the data in JSON format
    <br/>
    LIKE: http://localhost/airport/all.xml will return the data in XML format
    <br/>
    <br/>
    <u></u>
</p>
<p>
    <u>CASE INSENSITIVE URLS</u>
    <br/>
    The API URLS are case insensitive so you can use
    <br/>
LIKE: <a href="http://localhost/airport/api/all">http://localhost/airport/api/all</a> as    <a href="http://localhost/airport/api/AlL">http://localhost/airport/api/AlL</a>
    <br/>
    <br/>
    <br/>
    <u>Methods included in this API</u>
</p>
<p>
    <strong>1- </strong>
    <strong><u> ADD</u></strong>
</p>
<p>
    TYPE: POST
</p>
<p>
    <a href="http://localhost/airport/add">http://localhost/airport/api/add</a>
</p>
<p>
    Parameters:
    <br/>
    airport_code --- required
</p>
<p>
    airport_name --- required
</p>
<p>
    city --- required
</p>
<p>
    airport_code --- required
</p>
<p>
    country --- required
</p>
<p>
    user_id --- required
</p>
<p>
    <strong>2- </strong>
    <strong><u> UPDATE</u></strong>
</p>
<p>
    TYPE: POST
</p>
<p>
    <a href="http://localhost/airport/update">http://localhost/airport/api/update</a>
</p>
<p>
    Parameters:
    <br/>
    airport_name --- required
</p>
<p>
    city --- required
</p>
<p>
    airport_code --- required
</p>
<p>
    country --- required
</p>
<p>
    user_id --- required
</p>
<p>
    <strong>3- </strong>
    <strong><u> DELETE</u></strong>
</p>
<p>
    TYPE: POST
</p>
<p>
    <a href="http://localhost/airport/delete">http://localhost/airport/delete</a>
</p>
<p>
    Parameters:
    <br/>
    user_id --- required
</p>
<p>
    id --- required
</p>
<p>
    <strong>4- </strong>
    <strong><u>ALL</u></strong>
</p>
<p>
    TYPE: POST
</p>
<p>
    <a href="http://localhost/airport/all">http://localhost/airport/api/all</a>
</p>
<p>
    Parameters
    <br/>
    user_id --- required
</p>
<p>
    5- <strong><u>SEARCH</u></strong>
    <br/>
    TYPE : GET
</p>
<p>
    <a href="http://localhost/airport/search">http://localhost/airport/api/search</a>
</p>
<p>
    Parameters
    <br/>
    user_id --- required
</p>
<p>
    Id --- required
</p>
<p>
    *****************************
</p>
<p>
    USERS Table
</p>
<p>
    *****************************
</p>
<p>
    Table name = users
</p>
<p>
    1- ADMIN ROLE
</p>
<p>
    user name = shahbaz.admin
</p>
<p>
    user id = 1
</p>
<p>
    2- ADMIN USER
</p>
<p>
    user name = shahbaz.user
</p>
<p>
    user id = 2
</p>
<p>
    3- ADMIN GUEST
</p>
<p>
    user name = shahbaz.guest
</p>
<p>
    user id = 3
</p>