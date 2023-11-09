<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="choices-single-default"><b>Activity</b></label>
                                                <select class="form-control" name="activity" id="activity">
                                                    <option value="" data-country="" data-university="" disabled <?php echo empty($_POST['activity']) ? 'selected' : ''; ?>>Show All</option>
                                                    <?php
                                                    require_once 'connect.php';
                                                    $sql = "SELECT DISTINCT activity, country, university FROM dateinter";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->execute();
                                                    $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($checkings as $checking) {
                                                        $activity = $checking['activity'];
                                                        $country = $checking['country'];
                                                        $university = $checking['university'];
                                                        $selected = isset($_POST['activity']) && $_POST['activity'] === $activity ? 'selected' : '';
                                                        echo "<option value='$activity' data-country='$country' data-university='$university' $selected>$activity</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>