<select id="filter_priority" name="filter_priority" >
            <option value="" disabled selected>-- Select priority --</option>
            <?php foreach ($priorities as $priority): ?>
                <option value="<?= esc($priority['priority_id']) ?>"><?= esc($priority['p_desc']) ?></option>
            <?php endforeach; ?>
        </select>