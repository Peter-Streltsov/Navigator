<div class="jumbotron">
    <h2>Список сотрудников ЦЕИ РАН</h2>
    <br><br>
    <table class="table table-hover" style="background-color: #fff;">
        <thead>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Код</td>
            <td>Должность</td>
            <td></td>
        </thead>
            {% for data in data %}
                <tr>
                    <td>{{ data.name }}</td>
                    <td>{{ data.lastname}}</td>
                    <td>{{ data.setting }}</td>
                    <td></td>
                    <td><div class="dropdown" style="height: 20px; font-size: 8pt;">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="#">HTML</a></li>
                              <li><a href="#">CSS</a></li>
                              <li><a href="#">JavaScript</a></li>
                            </ul>
                          </div></td>
                <!--{% for item in data %}
                    <td>{{ item }}</td>
                {% endfor %}-->
                </tr>
            {% endfor %}
    </table>
  </div>