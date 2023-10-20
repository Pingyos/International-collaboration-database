<tbody>
                                                    <?php foreach ($results as $row) : ?>
                                                        <tr>
                                                            <td><?php echo $row['date_s']; ?></td>
                                                            <td><?php echo $row['date_e']; ?></td>
                                                            <td><?php echo $row['university']; ?></td>
                                                            <td><?php echo $row['activity']; ?></td>
                                                            <td>
                                                                <div class="flex align-items-center list-user-action">
                                                                    <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdropLive<?= $row['id']; ?>">
                                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.7161 16.2234H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M15.7161 12.0369H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M11.2521 7.86011H8.49707" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                        </span>
                                                                    </a>
                                                                    <a class="btn btn-sm btn-icon btn-warning" href="Date-University-View.php?university_id=<?= $row['university_id']; ?>">
                                                                        <span class="btn-inner">
                                                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M12.7 11.7488H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7002 16.7498L20.6372 11.7488L12.7002 6.74776V16.7498Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <div class="modal fade" id="staticBackdropLive<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel<?= $row['id']; ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLiveLabel<?= $row['id']; ?>">Details</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-card text-start">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">University</label>
                                                                                            <input type="text" name="university" value="<?= $row['university']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Department</label>
                                                                                            <?php
                                                                                            require_once 'connect.php';
                                                                                            $universityId = $row['university_id'];
                                                                                            $universityQuery = "SELECT university,department,ranking,mou,signed,expired,country,qs_suject FROM university WHERE university_id = :university_id";
                                                                                            $universityStmt = $conn->prepare($universityQuery);
                                                                                            $universityStmt->bindParam(':university_id', $universityId);
                                                                                            $universityStmt->execute();
                                                                                            $universityRow = $universityStmt->fetch(PDO::FETCH_ASSOC);
                                                                                            $departmentName = $universityRow['department'];
                                                                                            ?>
                                                                                            <input type="text" value="<?= $departmentName; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Ranking</label>
                                                                                            <input type="text" value="<?= $universityRow['ranking']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">qs_suject</label>
                                                                                            <input type="text" value="<?= $universityRow['qs_suject']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">MOU</label>
                                                                                            <input type="text" value="<?= $universityRow['mou']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Country</label>
                                                                                            <input type="text" value="<?= $universityRow['country']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Signed</label>
                                                                                            <input type="text" value="<?= $universityRow['signed']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Expired</label>
                                                                                            <input type="text" value="<?= $universityRow['expired']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>

                                                                                    <hr>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Start</label>
                                                                                            <input type="text" name="date_s" value="<?= $row['date_s']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">End</label>
                                                                                            <input type="text" name="date_e" value="<?= $row['date_e']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Activity</label>
                                                                                            <input type="text" name="activity" value="<?= $row['activity']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Name</label>
                                                                                            <input type="text" name="name" value="<?= $row['name']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">details</label>
                                                                                            <textarea class="form-control" name="details" style="height: 250px" disabled><?= $row['details']; ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>