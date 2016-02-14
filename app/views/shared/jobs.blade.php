<h4 class="title-bar jobs navbar"><i class="glyphicon glyphicon-briefcase"></i> Jobs List</h4>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Reference</th>
            <th>Location</th>
            <th class="text-right">Published on</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $jobs = Model\Job::where('status', 1)->get();
        if (count($jobs) > 0):
            foreach ($jobs as $job):
                ?>
                <tr>
                    <td><?php echo $job->name; ?></td>
                    <td><?php echo $job->reference; ?></td>
                    <td><?php echo $job->location; ?></td>
                    <td class="text-right"><?php echo Utils\Helper::dateTimeFromDb($job->created_at); ?></td>
                </tr>
                <?php
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="4">No results found.</td>
            </tr>
        <?php
        endif;
        ?>
    </tbody>
</table>