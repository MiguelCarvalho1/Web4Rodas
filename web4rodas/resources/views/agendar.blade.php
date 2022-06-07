@extends('layouts.main')
<h1>Agendamentos</h1>

<form>
  <fieldset>
      <div>
        <!-- These should be formatted as Dates -->
        <label>Data início</label>
        <input type="date" class="required" id="start-date" />
        
        <label>Data fim</label>
        <input type="date" class="required" id="end-date" />
       
      </div>
      <br>
      <div>
      <div>
        <label>Descrição</label>
        <textarea rows = "8" cols = "60" name = "descricao">
       </textarea>
      </div>
      <div>
        <br>
        <label>Motorista</label>
        <input type="text" id="instructor"/>
        <br>
      </div>
      <div>
        <br>
        <label>Veículo</label>
        <input type="text" id="instructor"/>
      </div>
      <br>
      <div class="button">
        <button id="save" type="submit">Guardar</button>
      </div>
    </fieldset>
     <br>
  