<style type="text/css">

</style>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="600">
  <tr>
    <td>
      <table id="header" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <a href="http://getmoving.fitness">getMoving.fitness</a>
          </td>
          <td>
            <a href="http://getmoving.fitness/workouts/create">Log Workout</a> | 
            <a href="http://getmoving.fitness/goals/create">Create Goal</a> |
            <a href="http://getmoving.fitness/weights/create">Track Weight</a>
          </td>
        </tr>
      </table>
      <table id="body" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>@yield('content')</td>
        </tr>
      </table>
      <table id="footer" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            Don't want to receive emails from us, <a href="http://getmoving.fitness/notifications">change notification settings.</a>
          </td>
        </tr>
        <tr>
          <td><a href="http://getmoving.fitness/notifications">unsubscribe</a></td>
        </tr>
        <tr>
          <td><a href="http://getMoving.fitness">getMoving.fitness</a> {{ date('Y') }}</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>