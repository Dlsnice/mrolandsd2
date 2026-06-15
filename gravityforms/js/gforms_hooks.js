
//----------------------------------------------------------
//------ JAVASCRIPT HOOK FUNCTIONS FOR GRAVITY FORMS -------
//----------------------------------------------------------

if ( ! gform ) {
	document.addEventListener( 'gform_main_scripts_loaded', function() { gform.scriptsLoaded = true; } );
<<<<<<< HEAD
	document.addEventListener( 'gform/theme/scripts_loaded', function() { gform.themeScriptsLoaded = true; } );
=======
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6
	window.addEventListener( 'DOMContentLoaded', function() { gform.domLoaded = true; } );

	var gform = {
		domLoaded: false,
		scriptsLoaded: false,
<<<<<<< HEAD
		themeScriptsLoaded: false,
		isFormEditor: () => typeof InitializeEditor === 'function',

		/**
		 * @deprecated 2.9 the use of initializeOnLoaded in the form editor context is deprecated.
		 * @remove-in 4.0 this function will not check for gform.isFormEditor().
		 */
		callIfLoaded: function ( fn ) {
			if ( gform.domLoaded && gform.scriptsLoaded && ( gform.themeScriptsLoaded || gform.isFormEditor() ) ) {
				if ( gform.isFormEditor() ) {
					console.warn( 'The use of gform.initializeOnLoaded() is deprecated in the form editor context and will be removed in Gravity Forms 3.1.' );
				}
				fn();
				return true;
			}
			return false;
		},

		/**
		 * Call a function when all scripts are loaded
		 *
		 * @param function fn the callback function to call when all scripts are loaded
		 *
		 * @returns void
		 */
		initializeOnLoaded: function( fn ) {
			if ( ! gform.callIfLoaded( fn ) ) {
				document.addEventListener( 'gform_main_scripts_loaded', () => { gform.scriptsLoaded = true; gform.callIfLoaded( fn ); } );
				document.addEventListener( 'gform/theme/scripts_loaded', () => { gform.themeScriptsLoaded = true; gform.callIfLoaded( fn ); } );
				window.addEventListener( 'DOMContentLoaded', () => { gform.domLoaded = true; gform.callIfLoaded( fn ); } );
			}
		},

=======
		initializeOnLoaded: function( fn ) {
			if ( gform.domLoaded && gform.scriptsLoaded ) {
				fn();
			} else if( ! gform.domLoaded && gform.scriptsLoaded ) {
				window.addEventListener( 'DOMContentLoaded', fn );
			} else {
				document.addEventListener( 'gform_main_scripts_loaded', fn );
			}
		},
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6
		hooks: { action: {}, filter: {} },
		addAction: function( action, callable, priority, tag ) {
			gform.addHook( 'action', action, callable, priority, tag );
		},
		addFilter: function( action, callable, priority, tag ) {
			gform.addHook( 'filter', action, callable, priority, tag );
		},
		doAction: function( action ) {
			gform.doHook( 'action', action, arguments );
		},
		applyFilters: function( action ) {
			return gform.doHook( 'filter', action, arguments );
		},
		removeAction: function( action, tag ) {
			gform.removeHook( 'action', action, tag );
		},
		removeFilter: function( action, priority, tag ) {
			gform.removeHook( 'filter', action, priority, tag );
		},
		addHook: function( hookType, action, callable, priority, tag ) {
			if ( undefined == gform.hooks[hookType][action] ) {
				gform.hooks[hookType][action] = [];
			}
			var hooks = gform.hooks[hookType][action];
			if ( undefined == tag ) {
				tag = action + '_' + hooks.length;
			}
			if( priority == undefined ){
				priority = 10;
			}

			gform.hooks[hookType][action].push( { tag:tag, callable:callable, priority:priority } );
		},
		doHook: function( hookType, action, args ) {

			// splice args from object into array and remove first index which is the hook name
			args = Array.prototype.slice.call(args, 1);

			if ( undefined != gform.hooks[hookType][action] ) {
				var hooks = gform.hooks[hookType][action], hook;
				//sort by priority
				hooks.sort(function(a,b){return a["priority"]-b["priority"]});
<<<<<<< HEAD

				hooks.forEach( function( hookItem ) {
					hook = hookItem.callable;

=======
				for( var i=0; i<hooks.length; i++) {
					hook = hooks[i].callable;
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6
					if(typeof hook != 'function')
						hook = window[hook];
					if ( 'action' == hookType ) {
						hook.apply(null, args);
					} else {
						args[0] = hook.apply(null, args);
					}
<<<<<<< HEAD
				} );
=======
				}
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6
			}
			if ( 'filter'==hookType ) {
				return args[0];
			}
		},
		removeHook: function( hookType, action, priority, tag ) {
			if ( undefined != gform.hooks[hookType][action] ) {
				var hooks = gform.hooks[hookType][action];
<<<<<<< HEAD
				hooks = hooks.filter( function(hook, index, arr) {
					var removeHook = (undefined==tag||tag==hook.tag) && (undefined==priority||priority==hook.priority);
					return !removeHook;
				} );
				gform.hooks[hookType][action] = hooks;
=======
				for( var i=hooks.length-1; i>=0; i--) {
					if ((undefined==tag||tag==hooks[i].tag) && (undefined==priority||priority==hooks[i].priority)){
						hooks.splice(i,1);
					}
				}
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6
			}
		}
	};
}
