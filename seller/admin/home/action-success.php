<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
            min-width:700px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
       .userRecord {
            cursor:pointer;
        }
        .completedList{
            background-color:#1bb481;
        }
        a.button {
            margin:20px;
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
            transition: background 0.3s ease;
        }

        a.button:hover {
            background-color: #0056b3;
        }
    </style>
    <!-- Sweetaleart 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        
    </div>
    <script type="text/javascript">
        const completedRecords = document.getElementsByClassName('completedRecords');
        for(let index=0; index<completedRecords.length; index++){
            completedRecords[index].onclick = ()=>{
                Swal.fire({
                    icon: 'question', 
                    text: 'The report is already sent to the client do you want to replace with new one ?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, I want to edit'
                }).then((e)=>{
                    if(e.isConfirmed){
                        // Handle the further process here
                        window.location.assign('seller/admin/home/upload-report.php?id='+encodeURIComponent(completedRecords[index].dataset.id));
                    }
                })

            }

        }
        const pendingRecords = document.getElementsByClassName('incompleteRecords');
        for(let index=0; index<pendingRecords.length; index++){
            pendingRecords[index].onclick = ()=>{
                // Handle the further process here
                window.location.assign('seller/admin/home/upload-report.php?id='+encodeURIComponent(pendingRecords[index].dataset.id));
            }
        }
        Swal.fire({
            icon:'success',
            text: "Action successful"
        }).then(()=>{
            window.location.replace('seller/admin/home/');
        })
    </script>
</body>
</html>
