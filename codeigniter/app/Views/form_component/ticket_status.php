<select id="filter_status" name="filter_status" >
            <option value="" disabled selected>-- Select Status --</option>
            <?php foreach ($statuses as $status): ?>
                <option value="<?= esc($status['status_id']) ?>"><?= esc($status['status_desc']) ?></option>
            <?php endforeach; ?>
        </select>