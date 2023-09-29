<body>
   <form>
   <div id="line" class="text-sm font-medium text-center text-gray-500  border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul id="ulTab" class=" flex flex-wrap -mb-px">
            <button id ="kwTab" class="highlight inline-block p-4 ">kWT</button>
            <button id='hourTab' class="highlight inline-block p-4 ">Hour</button>
        
    </ul>
</div>
   </form>

<style>

#kwTab:focus{

    border-bottom: 2px solid rgb(105, 105, 196); 
    color: rgb(105, 105, 196); 
}
#hourTab:focus{

border-bottom: 2px solid rgb(105, 105, 196); 
color: rgb(105, 105, 196); 
}
 
 

 div .p-8 {

  padding: 2rem;
  height: 90px;
  width: 30%;
  background-color: white;
  border-top-right-radius: 15px;
  border-top-left-radius: 15px;

}

ul#ulTab {
  list-style: none;
  margin-bottom: auto;
  padding: 0;
  position: relative;
  margin-left: 15px;
}


  </style>
  
  
 
      <script src="{{ asset('js/calculator.js') }}"></script>
</body>
