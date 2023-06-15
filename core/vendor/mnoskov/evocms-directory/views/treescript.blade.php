<script>
    var directory = {
        instances: [],

        originalMenuHandler: modx.tree.menuHandler,
        originalRestoreTree: modx.tree.restoreTree,

        registerInstance: function(container, instance) {
            directory.instances = directory.instances.filter(function(entry) {
                return entry.container.self != null;
            });

            directory.instances.push({
                container: container,
                instance: instance
            });
        }
    };

    modx.tree.menuHandler = function(action) {
        modx.tree.restoreTree = function() {
            directory.originalRestoreTree.call(modx.tree);
            modx.tree.restoreTree = directory.originalRestoreTree;

            if ([7, 9, 10, 4, 8].indexOf(action) !== -1) {
                for (var i = 0; i < directory.instances.length; i++) {
                    if (directory.instances[i].container.self) {
                        directory.instances[i].container.location.reload();
                    }
                }
            }
        };

        directory.originalMenuHandler.call(modx.tree, action);
    };
</script>
