<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Document</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

        <div class="container mx-auto">

            <form action="/dns-records/store" method="post">

                <select name="type" id="type">
                    <option value="A">A</option>
                    <option value="AAAA">AAAA</option>
                    <option value="ANAME">ANAME</option>
                    <option value="CNAME">CNAME</option>
                    <option value="MX">MX</option>
                    <option value="NS">NS</option>
                    <option value="SRV">SRV</option>
                    <option value="TXT">TXT</option>
                </select>

                <input type="text" name="name" placeholder="Name" required>

                <input type="text" name="content" placeholder="Content" required>

                <input type="number" name="prio" id="prio" step="1" placeholder="Priority" required>

                <input type="number" name="port" id="port" step="1" min="0" placeholder="Port" required>

                <input type="number" name="weight" id="weight" step="1" placeholder="Weight" required>

                <input type="number" name="ttl" step="1" min="1" placeholder="TTL">

                <button type="submit">Submit</button>

            </form>

        </div>

        <script>
            let typeSelect = document.getElementById('type')

            let prioInput = document.getElementById('prio')
            let portInput = document.getElementById('port')
            let weightInput = document.getElementById('weight')

            typeSelect.addEventListener('input', updateFields)

            function updateFields () {
                if (typeSelect.value === 'A') {
                    prioInput.disabled = true
                    portInput.disabled = true
                    weightInput.disabled = true
                } else if (typeSelect.value === 'AAAA') {
                    prioInput.disabled = true
                    portInput.disabled = true
                    weightInput.disabled = true
                } else if (typeSelect.value === 'ANAME') {
                    prioInput.disabled = true
                    portInput.disabled = true
                    weightInput.disabled = true
                } else if (typeSelect.value === 'CNAME') {
                    prioInput.disabled = true
                    portInput.disabled = true
                    weightInput.disabled = true
                } else if (typeSelect.value === 'MX') {
                    prioInput.disabled = false
                    portInput.disabled = true
                    weightInput.disabled = true
                } else if (typeSelect.value === 'NS') {
                    prioInput.disabled = true
                    portInput.disabled = true
                    weightInput.disabled = true
                } else if (typeSelect.value === 'SRV') {
                    prioInput.disabled = false
                    portInput.disabled = false
                    weightInput.disabled = false
                } else if (typeSelect.value === 'TXT') {
                    prioInput.disabled = true
                    portInput.disabled = true
                    weightInput.disabled = true
                }
            }

            updateFields()
        </script>
    </body>
</html>
