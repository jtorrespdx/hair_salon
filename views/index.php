<html>
    <head>
        <title>Hair Salon</title>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
    </head>
    <body>
        <div class='container'>
            <h1>Stylist Manager</h1>
            <p>This page will help you manage your stylists and their clients.</p>
            <p>Create a new stylist:</p>

            <form action="/stylists" method="post">
                <div class='form-group'>
                    <label for="name">Stylist name:</label>
                    <input id="name" name="name" class='form-control' type="text">
                </div>
                <button type="submit" class='btn btn-info'>Add stylist</button>
            </form>

            <form action='/delete_stylists' method='post'>
                <button type='submit' class='btn btn-danger'>Clear</button>
            </form>

            {% if stylists is not empty %}
                <p>Here are all of your stylists:</p>
                <ul>
                    {% for stylist in stylists %}
                        <li><a href="/stylists/{{ stylist.getId }}">{{ stylist.getName }}</a></li>
                    {% endfor %}
                </ul>
            {% else %}
                <p>There are no stylists yet!</p>
            {% endif %}
        </div>
    </body>
</html>
