<html>
   
   <head>
      <title>Delete a Record from MySQL Database</title>
   </head>
   
   <body>

               <form method = "post" action="delete.php">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
                        <td width = "100">Student ID</td>
                        <td><input name = "s_id" type = "text" ></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "delete" type = "submit" 
                              id = "delete" value = "Delete">
                        </td>
                     </tr>
                     
                  </table>
               </form>
        
   </body>
</html>