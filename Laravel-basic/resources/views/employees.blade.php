<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employees_List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="app.css" rel="stylesheet">

        
    </head>
    <body>
        <h1>List of employees</h1>
        <table border="1">
            <thead>
                <tr bgcolor="yellow">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->EmployeeID}}</td>
                    <td>{{$employee->Name}}</td>
                    <td>{{$employee->Department}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('addemployee') }}" method="post">
        @csrf
        <div>
            <h1>Add employee</h1>
            <label for="">Employee</label>
            <input type="text" name="employee_name">
            <br>
            <label for="">Department</label>
            <input type="text" name="department">
            <br>
            <input type="submit" name="submit" value="save post">
            @if(session("success"))
                <b>{{session("success")}}</b>
            @endif
        </div>
        </form>      
        <form action="{{ route('deleteemployee') }}" method='post'>
        @csrf
            <div>
                <h3>Delete employee</h3>
                <label for="">Employee ID</label>
                <input type="text" name="employee_id">
                <br>
                <input type="submit" name="submit" value="delete post">
                @if(session("success_delete"))
                <b>{{session("success_delete")}}</b>
                @endif
            </div>
        </form>      
    </body>
</html> 