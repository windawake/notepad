```html
<table>
    <tr><td>11</td><td>22</td><td>33</td></tr>
    <tr><td>11</td><td>22</td><td>33</td></tr>
    <tr><td>11</td><td>22</td><td>33</td></tr>
  </table>
  <br><br>
  <div class="table">
    <div class="table-row"><div class="table-cell">aa</div><div class="table-cell">bb</div><div class="table-cell">cc</div></div>
    <div class="table-row"><div class="table-cell">aa</div><div class="table-cell">bb</div><div class="table-cell">cc</div></div>
    <div class="table-row"><div class="table-cell">aa</div><div class="table-cell">bb</div><div class="table-cell">cc</div></div>
  </div>
```
```css
table {
      border-collapse: collapse;
    }
    table td{
      border: 1px solid black;
      
    }
    .table {
      display: table;
      border-collapse: collapse;
    }
    .table-row {
      display: table-row;
      width:100%;
    }
    .table-cell {
      display: table-cell;
      border: 1px solid black;
    }
```
