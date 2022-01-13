<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Document</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="py-24">

        <div class="container mx-auto">

            <form action="/dns-records/store" method="post" class="flex flex-col max-w-lg mx-auto">

                <select class="border rounded mb-4 px-4 py-2 disabled:opacity-50 disabled:cursor-not-allowed" name="type" id="type">
                    <option value="A">A</option>
                    <option value="AAAA">AAAA</option>
                    <option value="ANAME">ANAME</option>
                    <option value="CNAME">CNAME</option>
                    <option value="MX">MX</option>
                    <option value="NS">NS</option>
                    <option value="SRV">SRV</option>
                    <option value="TXT">TXT</option>
                </select>

                <input class="border rounded mb-4 px-4 py-2 disabled:opacity-50 disabled:cursor-not-allowed" type="text" name="name" placeholder="Name" required>

                <input class="border rounded mb-4 px-4 py-2 disabled:opacity-50 disabled:cursor-not-allowed" type="text" name="content" placeholder="Content" required>

                <input class="border rounded mb-4 px-4 py-2 disabled:opacity-50 disabled:cursor-not-allowed" type="number" name="prio" id="prio" step="1" placeholder="Priority" required>

                <input class="border rounded mb-4 px-4 py-2 disabled:opacity-50 disabled:cursor-not-allowed" type="number" name="port" id="port" step="1" min="0" placeholder="Port" required>

                <input class="border rounded mb-4 px-4 py-2 disabled:opacity-50 disabled:cursor-not-allowed" type="number" name="weight" id="weight" step="1" placeholder="Weight" required>

                <input class="border rounded mb-4 px-4 py-2 disabled:opacity-50 disabled:cursor-not-allowed" type="number" name="ttl" step="1" min="1" placeholder="TTL">

                <button type="submit" class="block bg-blue-500 rounded text-white font-bold px-8 py-4 text-center">Submit</button>

            </form>

        </div>

        <script>
            let typeSelect = document.getElementById('type')

            let prioInput = document.getElementById('prio')
            let portInput = document.getElementById('port')
            let weightInput = document.getElementById('weight')

            typeSelect.addEventListener('input', updateFields)

            function updateFields () {
                switch (typeSelect.value) {
                    case 'A':
                    case 'AAAA':
                    case 'ANAME':
                    case 'CNAME':
                    case 'NS':
                    case 'TXT':
                        prioInput.disabled = true
                        portInput.disabled = true
                        weightInput.disabled = true
                        break
                    case 'MX':
                        prioInput.disabled = false
                        portInput.disabled = true
                        weightInput.disabled = true
                        break
                    case 'SRV':
                        prioInput.disabled = false
                        portInput.disabled = false
                        weightInput.disabled = false
                }
            }

            updateFields()
        </script>
    </body>
</html>
