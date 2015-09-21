<<<<<<< HEAD
/* global tinymce, tinyMCEPreInit, QTags, setUserSetting */

window.switchEditors = {

	switchto: function( el ) {
		var aid = el.id,
			l = aid.length,
			id = aid.substr( 0, l - 5 ),
			mode = aid.substr( l - 4 );

		this.go( id, mode );
	},

	// mode can be 'html', 'tmce', or 'toggle'; 'html' is used for the 'Text' editor tab.
	go: function( id, mode ) {
		var t = this, ed, wrap_id, txtarea_el, iframe, editorHeight, toolbarHeight,
			DOM = tinymce.DOM; //DOMUtils outside the editor iframe

		id = id || 'content';
		mode = mode || 'toggle';

		ed = tinymce.get( id );
		wrap_id = 'wp-' + id + '-wrap';
		txtarea_el = DOM.get( id );

		if ( 'toggle' === mode ) {
			if ( ed && ! ed.isHidden() ) {
				mode = 'html';
			} else {
				mode = 'tmce';
			}
		}

		function getToolbarHeight() {
			var node = DOM.select( '.mce-toolbar-grp', ed.getContainer() )[0],
=======

( function( $ ) {
	function SwitchEditors() {
		var tinymce, $$,
			exports = {};

		function init() {
			if ( ! tinymce && window.tinymce ) {
				tinymce = window.tinymce;
				$$ = tinymce.$;

				$$( document ).on( 'click', function( event ) {
					var id, mode,
						target = $$( event.target );

					if ( target.hasClass( 'wp-switch-editor' ) ) {
						id = target.attr( 'data-wp-editor-id' );
						mode = target.hasClass( 'switch-tmce' ) ? 'tmce' : 'html';
						switchEditor( id, mode );
					}
				});
			}
		}

		function getToolbarHeight( editor ) {
			var node = $$( '.mce-toolbar-grp', editor.getContainer() )[0],
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				height = node && node.clientHeight;

			if ( height && height > 10 && height < 200 ) {
				return parseInt( height, 10 );
			}

			return 30;
		}

<<<<<<< HEAD
		if ( 'tmce' === mode || 'tinymce' === mode ) {
			if ( ed && ! ed.isHidden() ) {
				return false;
			}

			if ( typeof( QTags ) !== 'undefined' ) {
				QTags.closeAllTags( id );
			}

			editorHeight = txtarea_el ? parseInt( txtarea_el.style.height, 10 ) : 0;

			if ( tinyMCEPreInit.mceInit[ id ] && tinyMCEPreInit.mceInit[ id ].wpautop ) {
				txtarea_el.value = t.wpautop( txtarea_el.value );
			}

			if ( ed ) {
				ed.show();

				// No point resizing the iframe in iOS
				if ( ! tinymce.Env.iOS && editorHeight ) {
					toolbarHeight = getToolbarHeight();
					editorHeight = editorHeight - toolbarHeight + 14;

					// height cannot be under 50 or over 5000
					if ( editorHeight > 50 && editorHeight < 5000 ) {
						ed.theme.resizeTo( null, editorHeight );
					}
				}
			} else {
				tinymce.init( tinyMCEPreInit.mceInit[id] );
			}

			DOM.removeClass( wrap_id, 'html-active' );
			DOM.addClass( wrap_id, 'tmce-active' );
			DOM.setAttrib( txtarea_el, 'aria-hidden', true );
			setUserSetting( 'editor', 'tinymce' );

		} else if ( 'html' === mode ) {

			if ( ed && ed.isHidden() ) {
				return false;
			}

			if ( ed ) {
				if ( ! tinymce.Env.iOS ) {
					iframe = DOM.get( id + '_ifr' );
					editorHeight = iframe ? parseInt( iframe.style.height, 10 ) : 0;

					if ( editorHeight ) {
						toolbarHeight = getToolbarHeight();
						editorHeight = editorHeight + toolbarHeight - 14;

						// height cannot be under 50 or over 5000
						if ( editorHeight > 50 && editorHeight < 5000 ) {
							txtarea_el.style.height = editorHeight + 'px';
						}
					}
				}

				ed.hide();
			} else {
				// The TinyMCE instance doesn't exist, run the content through 'pre_wpautop()' and show the textarea
				if ( tinyMCEPreInit.mceInit[ id ] && tinyMCEPreInit.mceInit[ id ].wpautop ) {
					txtarea_el.value = t.pre_wpautop( txtarea_el.value );
				}

				DOM.setStyles( txtarea_el, {'display': '', 'visibility': ''} );
			}

			DOM.removeClass( wrap_id, 'tmce-active' );
			DOM.addClass( wrap_id, 'html-active' );
			DOM.setAttrib( txtarea_el, 'aria-hidden', false );
			setUserSetting( 'editor', 'html' );
		}
		return false;
	},

	_wp_Nop: function( content ) {
		var blocklist1, blocklist2,
			preserve_linebreaks = false,
			preserve_br = false;

		// Protect pre|script tags
		if ( content.indexOf( '<pre' ) !== -1 || content.indexOf( '<script' ) !== -1 ) {
			preserve_linebreaks = true;
			content = content.replace( /<(pre|script)[^>]*>[\s\S]+?<\/\1>/g, function( a ) {
				a = a.replace( /<br ?\/?>(\r\n|\n)?/g, '<wp-line-break>' );
				a = a.replace( /<\/?p( [^>]*)?>(\r\n|\n)?/g, '<wp-line-break>' );
				return a.replace( /\r?\n/g, '<wp-line-break>' );
			});
		}

		// keep <br> tags inside captions and remove line breaks
		if ( content.indexOf( '[caption' ) !== -1 ) {
			preserve_br = true;
			content = content.replace( /\[caption[\s\S]+?\[\/caption\]/g, function( a ) {
				return a.replace( /<br([^>]*)>/g, '<wp-temp-br$1>' ).replace( /[\r\n\t]+/, '' );
			});
		}

		// Pretty it up for the source editor
		blocklist1 = 'blockquote|ul|ol|li|table|thead|tbody|tfoot|tr|th|td|div|h[1-6]|p|fieldset';
		content = content.replace( new RegExp( '\\s*</(' + blocklist1 + ')>\\s*', 'g' ), '</$1>\n' );
		content = content.replace( new RegExp( '\\s*<((?:' + blocklist1 + ')(?: [^>]*)?)>', 'g' ), '\n<$1>' );

		// Mark </p> if it has any attributes.
		content = content.replace( /(<p [^>]+>.*?)<\/p>/g, '$1</p#>' );

		// Separate <div> containing <p>
		content = content.replace( /<div( [^>]*)?>\s*<p>/gi, '<div$1>\n\n' );

		// Remove <p> and <br />
		content = content.replace( /\s*<p>/gi, '' );
		content = content.replace( /\s*<\/p>\s*/gi, '\n\n' );
		content = content.replace( /\n[\s\u00a0]+\n/g, '\n\n' );
		content = content.replace( /\s*<br ?\/?>\s*/gi, '\n' );

		// Fix some block element newline issues
		content = content.replace( /\s*<div/g, '\n<div' );
		content = content.replace( /<\/div>\s*/g, '</div>\n' );
		content = content.replace( /\s*\[caption([^\[]+)\[\/caption\]\s*/gi, '\n\n[caption$1[/caption]\n\n' );
		content = content.replace( /caption\]\n\n+\[caption/g, 'caption]\n\n[caption' );

		blocklist2 = 'blockquote|ul|ol|li|table|thead|tbody|tfoot|tr|th|td|h[1-6]|pre|fieldset';
		content = content.replace( new RegExp('\\s*<((?:' + blocklist2 + ')(?: [^>]*)?)\\s*>', 'g' ), '\n<$1>' );
		content = content.replace( new RegExp('\\s*</(' + blocklist2 + ')>\\s*', 'g' ), '</$1>\n' );
		content = content.replace( /<li([^>]*)>/g, '\t<li$1>' );

		if ( content.indexOf( '<option' ) !== -1 ) {
			content = content.replace( /\s*<option/g, '\n<option' );
			content = content.replace( /\s*<\/select>/g, '\n</select>' );
		}

		if ( content.indexOf( '<hr' ) !== -1 ) {
			content = content.replace( /\s*<hr( [^>]*)?>\s*/g, '\n\n<hr$1>\n\n' );
		}

		if ( content.indexOf( '<object' ) !== -1 ) {
			content = content.replace( /<object[\s\S]+?<\/object>/g, function( a ) {
				return a.replace( /[\r\n]+/g, '' );
			});
		}

		// Unmark special paragraph closing tags
		content = content.replace( /<\/p#>/g, '</p>\n' );
		content = content.replace( /\s*(<p [^>]+>[\s\S]*?<\/p>)/g, '\n$1' );

		// Trim whitespace
		content = content.replace( /^\s+/, '' );
		content = content.replace( /[\s\u00a0]+$/, '' );

		// put back the line breaks in pre|script
		if ( preserve_linebreaks ) {
			content = content.replace( /<wp-line-break>/g, '\n' );
		}

		// and the <br> tags in captions
		if ( preserve_br ) {
			content = content.replace( /<wp-temp-br([^>]*)>/g, '<br$1>' );
		}

		return content;
	},

	_wp_Autop: function(pee) {
		var preserve_linebreaks = false,
			preserve_br = false,
			blocklist = 'table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre' +
				'|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|legend|section' +
				'|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary';

		if ( pee.indexOf( '<object' ) !== -1 ) {
			pee = pee.replace( /<object[\s\S]+?<\/object>/g, function( a ) {
				return a.replace( /[\r\n]+/g, '' );
			});
		}

		pee = pee.replace( /<[^<>]+>/g, function( a ){
			return a.replace( /[\r\n]+/g, ' ' );
		});

		// Protect pre|script tags
		if ( pee.indexOf( '<pre' ) !== -1 || pee.indexOf( '<script' ) !== -1 ) {
			preserve_linebreaks = true;
			pee = pee.replace( /<(pre|script)[^>]*>[\s\S]+?<\/\1>/g, function( a ) {
				return a.replace( /(\r\n|\n)/g, '<wp-line-break>' );
			});
		}

		// keep <br> tags inside captions and convert line breaks
		if ( pee.indexOf( '[caption' ) !== -1 ) {
			preserve_br = true;
			pee = pee.replace( /\[caption[\s\S]+?\[\/caption\]/g, function( a ) {
				// keep existing <br>
				a = a.replace( /<br([^>]*)>/g, '<wp-temp-br$1>' );
				// no line breaks inside HTML tags
				a = a.replace( /<[a-zA-Z0-9]+( [^<>]+)?>/g, function( b ) {
					return b.replace( /[\r\n\t]+/, ' ' );
				});
				// convert remaining line breaks to <br>
				return a.replace( /\s*\n\s*/g, '<wp-temp-br />' );
			});
		}

		pee = pee + '\n\n';
		pee = pee.replace( /<br \/>\s*<br \/>/gi, '\n\n' );
		pee = pee.replace( new RegExp( '(<(?:' + blocklist + ')(?: [^>]*)?>)', 'gi' ), '\n$1' );
		pee = pee.replace( new RegExp( '(</(?:' + blocklist + ')>)', 'gi' ), '$1\n\n' );
		pee = pee.replace( /<hr( [^>]*)?>/gi, '<hr$1>\n\n' ); // hr is self closing block element
		pee = pee.replace( /\s*<option/gi, '<option' ); // No <p> or <br> around <option>
		pee = pee.replace( /<\/option>\s*/gi, '</option>' );
		pee = pee.replace( /\r\n|\r/g, '\n' );
		pee = pee.replace( /\n\s*\n+/g, '\n\n' );
		pee = pee.replace( /([\s\S]+?)\n\n/g, '<p>$1</p>\n' );
		pee = pee.replace( /<p>\s*?<\/p>/gi, '');
		pee = pee.replace( new RegExp( '<p>\\s*(</?(?:' + blocklist + ')(?: [^>]*)?>)\\s*</p>', 'gi' ), '$1' );
		pee = pee.replace( /<p>(<li.+?)<\/p>/gi, '$1');
		pee = pee.replace( /<p>\s*<blockquote([^>]*)>/gi, '<blockquote$1><p>');
		pee = pee.replace( /<\/blockquote>\s*<\/p>/gi, '</p></blockquote>');
		pee = pee.replace( new RegExp( '<p>\\s*(</?(?:' + blocklist + ')(?: [^>]*)?>)', 'gi' ), '$1' );
		pee = pee.replace( new RegExp( '(</?(?:' + blocklist + ')(?: [^>]*)?>)\\s*</p>', 'gi' ), '$1' );
		pee = pee.replace( /\s*\n/gi, '<br />\n');
		pee = pee.replace( new RegExp( '(</?(?:' + blocklist + ')[^>]*>)\\s*<br />', 'gi' ), '$1' );
		pee = pee.replace( /<br \/>(\s*<\/?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)>)/gi, '$1' );
		pee = pee.replace( /(?:<p>|<br ?\/?>)*\s*\[caption([^\[]+)\[\/caption\]\s*(?:<\/p>|<br ?\/?>)*/gi, '[caption$1[/caption]' );

		pee = pee.replace( /(<(?:div|th|td|form|fieldset|dd)[^>]*>)(.*?)<\/p>/g, function( a, b, c ) {
			if ( c.match( /<p( [^>]*)?>/ ) ) {
				return a;
			}

			return b + '<p>' + c + '</p>';
		});

		// put back the line breaks in pre|script
		if ( preserve_linebreaks ) {
			pee = pee.replace( /<wp-line-break>/g, '\n' );
		}

		if ( preserve_br ) {
			pee = pee.replace( /<wp-temp-br([^>]*)>/g, '<br$1>' );
		}

		return pee;
	},

	pre_wpautop: function( content ) {
		var t = this, o = { o: t, data: content, unfiltered: content },
			q = typeof( jQuery ) !== 'undefined';

		if ( q ) {
			jQuery( 'body' ).trigger( 'beforePreWpautop', [ o ] );
		}

		o.data = t._wp_Nop( o.data );

		if ( q ) {
			jQuery('body').trigger('afterPreWpautop', [ o ] );
		}

		return o.data;
	},

	wpautop: function( pee ) {
		var t = this, o = { o: t, data: pee, unfiltered: pee },
			q = typeof( jQuery ) !== 'undefined';

		if ( q ) {
			jQuery( 'body' ).trigger('beforeWpautop', [ o ] );
		}

		o.data = t._wp_Autop( o.data );

		if ( q ) {
			jQuery( 'body' ).trigger('afterWpautop', [ o ] );
		}

		return o.data;
	}
};
=======
		function switchEditor( id, mode ) {
			id = id || 'content';
			mode = mode || 'toggle';

			var editorHeight, toolbarHeight, iframe,
				editor = tinymce.get( id ),
				wrap = $$( '#wp-' + id + '-wrap' ),
				$textarea = $$( '#' + id ),
				textarea = $textarea[0];

			if ( 'toggle' === mode ) {
				if ( editor && ! editor.isHidden() ) {
					mode = 'html';
				} else {
					mode = 'tmce';
				}
			}

			if ( 'tmce' === mode || 'tinymce' === mode ) {
				if ( editor && ! editor.isHidden() ) {
					return false;
				}

				if ( typeof( window.QTags ) !== 'undefined' ) {
					window.QTags.closeAllTags( id );
				}

				editorHeight = parseInt( textarea.style.height, 10 ) || 0;

				if ( editor ) {
					editor.show();

					// No point resizing the iframe in iOS
					if ( ! tinymce.Env.iOS && editorHeight ) {
						toolbarHeight = getToolbarHeight( editor );
						editorHeight = editorHeight - toolbarHeight + 14;

						// height cannot be under 50 or over 5000
						if ( editorHeight > 50 && editorHeight < 5000 ) {
							editor.theme.resizeTo( null, editorHeight );
						}
					}
				} else {
					tinymce.init( window.tinyMCEPreInit.mceInit[id] );
				}

				wrap.removeClass( 'html-active' ).addClass( 'tmce-active' );
				$textarea.attr( 'aria-hidden', true );
				window.setUserSetting( 'editor', 'tinymce' );

			} else if ( 'html' === mode ) {
				if ( editor && editor.isHidden() ) {
					return false;
				}

				if ( editor ) {
					if ( ! tinymce.Env.iOS ) {
						iframe = editor.iframeElement;
						editorHeight = iframe ? parseInt( iframe.style.height, 10 ) : 0;

						if ( editorHeight ) {
							toolbarHeight = getToolbarHeight( editor );
							editorHeight = editorHeight + toolbarHeight - 14;

							// height cannot be under 50 or over 5000
							if ( editorHeight > 50 && editorHeight < 5000 ) {
								textarea.style.height = editorHeight + 'px';
							}
						}
					}

					editor.hide();
				} else {
					// The TinyMCE instance doesn't exist, show the textarea
					$textarea.css({ 'display': '', 'visibility': '' });
				}

				wrap.removeClass( 'tmce-active' ).addClass( 'html-active' );
				$textarea.attr( 'aria-hidden', false );
				window.setUserSetting( 'editor', 'html' );
			}
		}

		// Replace paragraphs with double line breaks
		function removep( html ) {
			var blocklist = 'blockquote|ul|ol|li|table|thead|tbody|tfoot|tr|th|td|h[1-6]|fieldset',
				blocklist1 = blocklist + '|div|p',
				blocklist2 = blocklist + '|pre',
				preserve_linebreaks = false,
				preserve_br = false;

			if ( ! html ) {
				return '';
			}

			// Protect pre|script tags
			if ( html.indexOf( '<pre' ) !== -1 || html.indexOf( '<script' ) !== -1 ) {
				preserve_linebreaks = true;
				html = html.replace( /<(pre|script)[^>]*>[\s\S]+?<\/\1>/g, function( a ) {
					a = a.replace( /<br ?\/?>(\r\n|\n)?/g, '<wp-line-break>' );
					a = a.replace( /<\/?p( [^>]*)?>(\r\n|\n)?/g, '<wp-line-break>' );
					return a.replace( /\r?\n/g, '<wp-line-break>' );
				});
			}

			// keep <br> tags inside captions and remove line breaks
			if ( html.indexOf( '[caption' ) !== -1 ) {
				preserve_br = true;
				html = html.replace( /\[caption[\s\S]+?\[\/caption\]/g, function( a ) {
					return a.replace( /<br([^>]*)>/g, '<wp-temp-br$1>' ).replace( /[\r\n\t]+/, '' );
				});
			}

			// Pretty it up for the source editor
			html = html.replace( new RegExp( '\\s*</(' + blocklist1 + ')>\\s*', 'g' ), '</$1>\n' );
			html = html.replace( new RegExp( '\\s*<((?:' + blocklist1 + ')(?: [^>]*)?)>', 'g' ), '\n<$1>' );

			// Mark </p> if it has any attributes.
			html = html.replace( /(<p [^>]+>.*?)<\/p>/g, '$1</p#>' );

			// Separate <div> containing <p>
			html = html.replace( /<div( [^>]*)?>\s*<p>/gi, '<div$1>\n\n' );

			// Remove <p> and <br />
			html = html.replace( /\s*<p>/gi, '' );
			html = html.replace( /\s*<\/p>\s*/gi, '\n\n' );
			html = html.replace( /\n[\s\u00a0]+\n/g, '\n\n' );
			html = html.replace( /\s*<br ?\/?>\s*/gi, '\n' );

			// Fix some block element newline issues
			html = html.replace( /\s*<div/g, '\n<div' );
			html = html.replace( /<\/div>\s*/g, '</div>\n' );
			html = html.replace( /\s*\[caption([^\[]+)\[\/caption\]\s*/gi, '\n\n[caption$1[/caption]\n\n' );
			html = html.replace( /caption\]\n\n+\[caption/g, 'caption]\n\n[caption' );

			html = html.replace( new RegExp('\\s*<((?:' + blocklist2 + ')(?: [^>]*)?)\\s*>', 'g' ), '\n<$1>' );
			html = html.replace( new RegExp('\\s*</(' + blocklist2 + ')>\\s*', 'g' ), '</$1>\n' );
			html = html.replace( /<li([^>]*)>/g, '\t<li$1>' );

			if ( html.indexOf( '<option' ) !== -1 ) {
				html = html.replace( /\s*<option/g, '\n<option' );
				html = html.replace( /\s*<\/select>/g, '\n</select>' );
			}

			if ( html.indexOf( '<hr' ) !== -1 ) {
				html = html.replace( /\s*<hr( [^>]*)?>\s*/g, '\n\n<hr$1>\n\n' );
			}

			if ( html.indexOf( '<object' ) !== -1 ) {
				html = html.replace( /<object[\s\S]+?<\/object>/g, function( a ) {
					return a.replace( /[\r\n]+/g, '' );
				});
			}

			// Unmark special paragraph closing tags
			html = html.replace( /<\/p#>/g, '</p>\n' );
			html = html.replace( /\s*(<p [^>]+>[\s\S]*?<\/p>)/g, '\n$1' );

			// Trim whitespace
			html = html.replace( /^\s+/, '' );
			html = html.replace( /[\s\u00a0]+$/, '' );

			// put back the line breaks in pre|script
			if ( preserve_linebreaks ) {
				html = html.replace( /<wp-line-break>/g, '\n' );
			}

			// and the <br> tags in captions
			if ( preserve_br ) {
				html = html.replace( /<wp-temp-br([^>]*)>/g, '<br$1>' );
			}

			return html;
		}

		// Similar to `wpautop()` in formatting.php
		function autop( text ) {
			var preserve_linebreaks = false,
				preserve_br = false,
				blocklist = 'table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre' +
					'|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|legend|section' +
					'|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary';

			// Normalize line breaks
			text = text.replace( /\r\n|\r/g, '\n' );

			if ( text.indexOf( '\n' ) === -1 ) {
				return text;
			}

			if ( text.indexOf( '<object' ) !== -1 ) {
				text = text.replace( /<object[\s\S]+?<\/object>/g, function( a ) {
					return a.replace( /\n+/g, '' );
				});
			}

			text = text.replace( /<[^<>]+>/g, function( a ) {
				return a.replace( /[\n\t ]+/g, ' ' );
			});

			// Protect pre|script tags
			if ( text.indexOf( '<pre' ) !== -1 || text.indexOf( '<script' ) !== -1 ) {
				preserve_linebreaks = true;
				text = text.replace( /<(pre|script)[^>]*>[\s\S]+?<\/\1>/g, function( a ) {
					return a.replace( /\n/g, '<wp-line-break>' );
				});
			}

			// keep <br> tags inside captions and convert line breaks
			if ( text.indexOf( '[caption' ) !== -1 ) {
				preserve_br = true;
				text = text.replace( /\[caption[\s\S]+?\[\/caption\]/g, function( a ) {
					// keep existing <br>
					a = a.replace( /<br([^>]*)>/g, '<wp-temp-br$1>' );
					// no line breaks inside HTML tags
					a = a.replace( /<[^<>]+>/g, function( b ) {
						return b.replace( /[\n\t ]+/, ' ' );
					});
					// convert remaining line breaks to <br>
					return a.replace( /\s*\n\s*/g, '<wp-temp-br />' );
				});
			}

			text = text + '\n\n';
			text = text.replace( /<br \/>\s*<br \/>/gi, '\n\n' );
			text = text.replace( new RegExp( '(<(?:' + blocklist + ')(?: [^>]*)?>)', 'gi' ), '\n$1' );
			text = text.replace( new RegExp( '(</(?:' + blocklist + ')>)', 'gi' ), '$1\n\n' );
			text = text.replace( /<hr( [^>]*)?>/gi, '<hr$1>\n\n' ); // hr is self closing block element
			text = text.replace( /\s*<option/gi, '<option' ); // No <p> or <br> around <option>
			text = text.replace( /<\/option>\s*/gi, '</option>' );
			text = text.replace( /\n\s*\n+/g, '\n\n' );
			text = text.replace( /([\s\S]+?)\n\n/g, '<p>$1</p>\n' );
			text = text.replace( /<p>\s*?<\/p>/gi, '');
			text = text.replace( new RegExp( '<p>\\s*(</?(?:' + blocklist + ')(?: [^>]*)?>)\\s*</p>', 'gi' ), '$1' );
			text = text.replace( /<p>(<li.+?)<\/p>/gi, '$1');
			text = text.replace( /<p>\s*<blockquote([^>]*)>/gi, '<blockquote$1><p>');
			text = text.replace( /<\/blockquote>\s*<\/p>/gi, '</p></blockquote>');
			text = text.replace( new RegExp( '<p>\\s*(</?(?:' + blocklist + ')(?: [^>]*)?>)', 'gi' ), '$1' );
			text = text.replace( new RegExp( '(</?(?:' + blocklist + ')(?: [^>]*)?>)\\s*</p>', 'gi' ), '$1' );

			// Remove redundant spaces and line breaks after existing <br /> tags
			text = text.replace( /(<br[^>]*>)\s*\n/gi, '$1' );

			// Create <br /> from the remaining line breaks
			text = text.replace( /\s*\n/g, '<br />\n');

			text = text.replace( new RegExp( '(</?(?:' + blocklist + ')[^>]*>)\\s*<br />', 'gi' ), '$1' );
			text = text.replace( /<br \/>(\s*<\/?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)>)/gi, '$1' );
			text = text.replace( /(?:<p>|<br ?\/?>)*\s*\[caption([^\[]+)\[\/caption\]\s*(?:<\/p>|<br ?\/?>)*/gi, '[caption$1[/caption]' );

			text = text.replace( /(<(?:div|th|td|form|fieldset|dd)[^>]*>)(.*?)<\/p>/g, function( a, b, c ) {
				if ( c.match( /<p( [^>]*)?>/ ) ) {
					return a;
				}

				return b + '<p>' + c + '</p>';
			});

			// put back the line breaks in pre|script
			if ( preserve_linebreaks ) {
				text = text.replace( /<wp-line-break>/g, '\n' );
			}

			if ( preserve_br ) {
				text = text.replace( /<wp-temp-br([^>]*)>/g, '<br$1>' );
			}

			return text;
		}

		// Add old events
		function pre_wpautop( html ) {
			var obj = { o: exports, data: html, unfiltered: html };

			if ( $ ) {
				$( 'body' ).trigger( 'beforePreWpautop', [ obj ] );
			}

			obj.data = removep( obj.data );

			if ( $ ) {
				$( 'body' ).trigger( 'afterPreWpautop', [ obj ] );
			}

			return obj.data;
		}

		function wpautop( text ) {
			var obj = { o: exports, data: text, unfiltered: text };

			if ( $ ) {
				$( 'body' ).trigger( 'beforeWpautop', [ obj ] );
			}

			obj.data = autop( obj.data );

			if ( $ ) {
				$( 'body' ).trigger( 'afterWpautop', [ obj ] );
			}

			return obj.data;
		}

		if ( $ ) {
			$( document ).ready( init );
		} else if ( document.addEventListener ) {
			document.addEventListener( 'DOMContentLoaded', init, false );
			window.addEventListener( 'load', init, false );
		} else if ( window.attachEvent ) {
			window.attachEvent( 'onload', init );
			document.attachEvent( 'onreadystatechange', function() {
				if ( 'complete' === document.readyState ) {
					init();
				}
			} );
		}

		window.wp = window.wp || {};
		window.wp.editor = window.wp.editor || {};
		window.wp.editor.autop = wpautop;
		window.wp.editor.removep = pre_wpautop;

		exports = {
			go: switchEditor,
			wpautop: wpautop,
			pre_wpautop: pre_wpautop,
			_wp_Autop: autop,
			_wp_Nop: removep
		};

		return exports;
	}

	window.switchEditors = new SwitchEditors();
}( window.jQuery ));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
