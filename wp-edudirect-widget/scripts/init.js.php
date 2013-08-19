<script>
  new QuickDegreeFinder({
    'id':           '<?php echo $id ?>',

    <?php if ( $degree || $category || $subject ) : ?>

    'defaults':     {
      'degrees':    '<?php echo $degree ?>',
      'categories': '<?php echo $category ?>',
      'subjects':   '<?php echo $subject ?>',
    },

    <?php endif; ?>

    'elements':     {
      'degrees':    jQuery('#<?php echo $id ?> select[name=degree_level_id]'),
      'categories': jQuery('#<?php echo $id ?> select[name=category_id]'),
      'subjects':   jQuery('#<?php echo $id ?> select[name=subject_id]')
    }
  });
</script>
