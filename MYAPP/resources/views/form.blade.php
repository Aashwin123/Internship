<div>
<form action="Gform" method="post">
     @csrf
<div>
    <h4>User skill</h4>
     <input type="checkbox" name="skill[]" value="PHP" id="php"> 
     <label for="php">PHP</label>
     
     <input type="checkbox" name="skill[]" value="Node" id="node"> 
     <label for="node">Node</label>
     
     <input type="checkbox" name="skill[]" value="java" id="java"> 
     <label for="java">Java</label>
</div>

<h5>Gender</h5>
<input type="radio" name="gender" value="male" id="male"> 
     <label for="male">male</label>

     <input type="radio" name="gender" value="female" id="female"> 
     <label for="female">female</label>

     <h5>City</h5>
     <select name="city">
        <option value="Mnr">mnr</option>
        <option value="Dhng">Dhng</option>
        <option value="Ddl">Ddl</option>

     </select>
     <div><button>Add New User</button></div>
     
</form>
</div>