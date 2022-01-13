<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Document</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="pb-24 pt-24">

        <div class="container mx-auto">

            <div class="flex justify-between">
                <h1 class="font-bold text-4xl">DNS Records</h1>
                <a href="/dns-records/create" class="block w-fit bg-blue-500 rounded text-white font-bold px-8 py-4 ml-auto">Add DNS Record</a>
            </div>


            <section>
                <h2 class="text-2xl font-bold mt-12 mb-6">A Records</h2>

                <table class="w-full border">
                    <colgroup>
                        <col class="w-1">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-1">
                    </colgroup>

                    <thead class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getARecords() as $record): ?>
                            <tr>
                                <td class="p-4"><?= $record->getId() ?></td>
                                <td class="p-4"><?= $record->getType() ?></td>
                                <td class="p-4"><?= $record->getName() ?></td>
                                <td class="p-4"><?= $record->getContent() ?></td>
                                <td class="p-4"><?= $record->getTtl() ?></td>
                                <td class="p-4"><?= $record->getNote() ?></td>
                                <td class="p-4">
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="bg-red-500 rounded-full text-white text-bold ml-auto w-8 h-8 flex items-center justify-center">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </section>

            <section>
                <h2 class="text-2xl font-bold mt-12 mb-6">AAAA Records</h2>

                <table class="w-full border">
                    <colgroup>
                        <col class="w-1">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-1">
                    </colgroup>
                    <thead class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getAaaaRecords() as $record): ?>
                            <tr>
                                <td class="p-4"><?= $record->getId() ?></td>
                                <td class="p-4"><?= $record->getType() ?></td>
                                <td class="p-4"><?= $record->getName() ?></td>
                                <td class="p-4"><?= $record->getContent() ?></td>
                                <td class="p-4"><?= $record->getTtl() ?></td>
                                <td class="p-4"><?= $record->getNote() ?></td>
                                <td class="p-4">
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="bg-red-500 rounded-full text-white text-bold ml-auto w-8 h-8 flex items-center justify-center">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </section>

            <section>
                <h2 class="text-2xl font-bold mt-12 mb-6">ANAME Records</h2>

                <table class="w-full border">
                    <colgroup>
                        <col class="w-1">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-1">
                    </colgroup>
                    <thead class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getAnameRecords() as $record): ?>
                            <tr>
                                <td class="p-4"><?= $record->getId() ?></td>
                                <td class="p-4"><?= $record->getType() ?></td>
                                <td class="p-4"><?= $record->getName() ?></td>
                                <td class="p-4"><?= $record->getContent() ?></td>
                                <td class="p-4"><?= $record->getTtl() ?></td>
                                <td class="p-4"><?= $record->getNote() ?></td>
                                <td class="p-4">
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="bg-red-500 rounded-full text-white text-bold ml-auto w-8 h-8 flex items-center justify-center">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </section>

            <section>
                <h2 class="text-2xl font-bold mt-12 mb-6">CNAME Records</h2>

                <table class="w-full border">
                    <colgroup>
                        <col class="w-1">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-1">
                    </colgroup>
                    <thead class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getCnameRecords() as $record): ?>
                            <tr>
                                <td class="p-4"><?= $record->getId() ?></td>
                                <td class="p-4"><?= $record->getType() ?></td>
                                <td class="p-4"><?= $record->getName() ?></td>
                                <td class="p-4"><?= $record->getContent() ?></td>
                                <td class="p-4"><?= $record->getTtl() ?></td>
                                <td class="p-4"><?= $record->getNote() ?></td>
                                <td class="p-4">
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="bg-red-500 rounded-full text-white text-bold ml-auto w-8 h-8 flex items-center justify-center">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </section>

            <section>
                <h2 class="text-2xl font-bold mt-12 mb-6">MX Records</h2>

                <table class="w-full border">
                    <colgroup>
                        <col class="w-1">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-1">
                    </colgroup>
                    <thead class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">Priority</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getMxRecords() as $record): ?>
                            <tr>
                                <td class="p-4"><?= $record->getId() ?></td>
                                <td class="p-4"><?= $record->getType() ?></td>
                                <td class="p-4"><?= $record->getName() ?></td>
                                <td class="p-4"><?= $record->getContent() ?></td>
                                <td class="p-4"><?= $record->getPrio() ?></td>
                                <td class="p-4"><?= $record->getTtl() ?></td>
                                <td class="p-4"><?= $record->getNote() ?></td>
                                <td class="p-4">
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="bg-red-500 rounded-full text-white text-bold ml-auto w-8 h-8 flex items-center justify-center">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">Priority</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </section>

            <section>
                <h2 class="text-2xl font-bold mt-12 mb-6">NS Records</h2>

                <table class="w-full border">
                    <colgroup>
                        <col class="w-1">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-1">
                    </colgroup>
                    <thead class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getNsRecords() as $record): ?>
                            <tr>
                                <td class="p-4"><?= $record->getId() ?></td>
                                <td class="p-4"><?= $record->getType() ?></td>
                                <td class="p-4"><?= $record->getName() ?></td>
                                <td class="p-4"><?= $record->getContent() ?></td>
                                <td class="p-4"><?= $record->getTtl() ?></td>
                                <td class="p-4"><?= $record->getNote() ?></td>
                                <td class="p-4">
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="bg-red-500 rounded-full text-white text-bold ml-auto w-8 h-8 flex items-center justify-center">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </section>

            <section>
                <h2 class="text-2xl font-bold mt-12 mb-6">SRV Records</h2>

                <table class="w-full border">
                    <colgroup>
                        <col class="w-1">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-1">
                    </colgroup>
                    <thead class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">Priority</th>
                            <th class="p-4">Port</th>
                            <th class="p-4">Weight</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getSrvRecords() as $record): ?>
                            <tr>
                                <td class="p-4"><?= $record->getId() ?></td>
                                <td class="p-4"><?= $record->getType() ?></td>
                                <td class="p-4"><?= $record->getName() ?></td>
                                <td class="p-4"><?= $record->getContent() ?></td>
                                <td class="p-4"><?= $record->getPrio() ?></td>
                                <td class="p-4"><?= $record->getPort() ?></td>
                                <td class="p-4"><?= $record->getWeight() ?></td>
                                <td class="p-4"><?= $record->getTtl() ?></td>
                                <td class="p-4"><?= $record->getNote() ?></td>
                                <td class="p-4">
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="bg-red-500 rounded-full text-white text-bold ml-auto w-8 h-8 flex items-center justify-center">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">Priority</th>
                            <th class="p-4">Port</th>
                            <th class="p-4">Weight</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </section>

            <section>
                <h2 class="text-2xl font-bold mt-12 mb-6">TXT Records</h2>

                <table class="w-full border">
                    <colgroup>
                        <col class="w-1">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-1">
                    </colgroup>
                    <thead class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getTxtRecords() as $record): ?>
                            <tr>
                                <td class="p-4"><?= $record->getId() ?></td>
                                <td class="p-4"><?= $record->getType() ?></td>
                                <td class="p-4"><?= $record->getName() ?></td>
                                <td class="p-4"><?= $record->getContent() ?></td>
                                <td class="p-4"><?= $record->getTtl() ?></td>
                                <td class="p-4"><?= $record->getNote() ?></td>
                                <td class="p-4">
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="bg-red-500 rounded-full text-white text-bold ml-auto w-8 h-8 flex items-center justify-center">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot class="text-left">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Content</th>
                            <th class="p-4">TTL</th>
                            <th class="p-4">Note</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </section>

        </div>

    </body>
</html>
