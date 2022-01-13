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

            <a href="/dns-records/create">Add DNS Record</a>

            <section>
                <h2>A Records</h2>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getARecords() as $record): ?>
                            <tr>
                                <td><?= $record->getId() ?></td>
                                <td><?= $record->getType() ?></td>
                                <td><?= $record->getName() ?></td>
                                <td><?= $record->getContent() ?></td>
                                <td><?= $record->getTtl() ?></td>
                                <td><?= $record->getNote() ?></td>
                                <td>
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <hr>
            </section>

            <section>
                <h2>AAAA Records</h2>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getAaaaRecords() as $record): ?>
                            <tr>
                                <td><?= $record->getId() ?></td>
                                <td><?= $record->getType() ?></td>
                                <td><?= $record->getName() ?></td>
                                <td><?= $record->getContent() ?></td>
                                <td><?= $record->getTtl() ?></td>
                                <td><?= $record->getNote() ?></td>
                                <td>
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <hr>
            </section>

            <section>
                <h2>ANAME Records</h2>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getAnameRecords() as $record): ?>
                            <tr>
                                <td><?= $record->getId() ?></td>
                                <td><?= $record->getType() ?></td>
                                <td><?= $record->getName() ?></td>
                                <td><?= $record->getContent() ?></td>
                                <td><?= $record->getTtl() ?></td>
                                <td><?= $record->getNote() ?></td>
                                <td>
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <hr>
            </section>

            <section>
                <h2>CNAME Records</h2>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getCnameRecords() as $record): ?>
                            <tr>
                                <td><?= $record->getId() ?></td>
                                <td><?= $record->getType() ?></td>
                                <td><?= $record->getName() ?></td>
                                <td><?= $record->getContent() ?></td>
                                <td><?= $record->getTtl() ?></td>
                                <td><?= $record->getNote() ?></td>
                                <td>
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <hr>
            </section>

            <section>
                <h2>MX Records</h2>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Priority</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getMxRecords() as $record): ?>
                            <tr>
                                <td><?= $record->getId() ?></td>
                                <td><?= $record->getType() ?></td>
                                <td><?= $record->getName() ?></td>
                                <td><?= $record->getContent() ?></td>
                                <td><?= $record->getPrio() ?></td>
                                <td><?= $record->getTtl() ?></td>
                                <td><?= $record->getNote() ?></td>
                                <td>
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Priority</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <hr>
            </section>

            <section>
                <h2>NS Records</h2>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getNsRecords() as $record): ?>
                            <tr>
                                <td><?= $record->getId() ?></td>
                                <td><?= $record->getType() ?></td>
                                <td><?= $record->getName() ?></td>
                                <td><?= $record->getContent() ?></td>
                                <td><?= $record->getTtl() ?></td>
                                <td><?= $record->getNote() ?></td>
                                <td>
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <hr>
            </section>

            <section>
                <h2>SRV Records</h2>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Priority</th>
                            <th>Port</th>
                            <th>Weight</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getSrvRecords() as $record): ?>
                            <tr>
                                <td><?= $record->getId() ?></td>
                                <td><?= $record->getType() ?></td>
                                <td><?= $record->getName() ?></td>
                                <td><?= $record->getContent() ?></td>
                                <td><?= $record->getPrio() ?></td>
                                <td><?= $record->getPort() ?></td>
                                <td><?= $record->getWeight() ?></td>
                                <td><?= $record->getTtl() ?></td>
                                <td><?= $record->getNote() ?></td>
                                <td>
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Priority</th>
                            <th>Port</th>
                            <th>Weight</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <hr>
            </section>

            <section>
                <h2>TXT Records</h2>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dnsRecordList->getTxtRecords() as $record): ?>
                            <tr>
                                <td><?= $record->getId() ?></td>
                                <td><?= $record->getType() ?></td>
                                <td><?= $record->getName() ?></td>
                                <td><?= $record->getContent() ?></td>
                                <td><?= $record->getTtl() ?></td>
                                <td><?= $record->getNote() ?></td>
                                <td>
                                    <form action="/dns-records/<?= $record->getId() ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>TTL</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <hr>
            </section>

        </div>

    </body>
</html>
