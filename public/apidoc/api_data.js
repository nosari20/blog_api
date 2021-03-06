define({ "api": [
  {
    "type": "get",
    "url": "/categories",
    "title": "Request Categories",
    "version": "1.0.0",
    "group": "Category",
    "name": "GetCategories",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "categories",
            "description": "<p>List of categories.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "category.id",
            "description": "<p>Id of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "category.title",
            "description": "<p>Title of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "category.sluged_title",
            "description": "<p>Sluged itle of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "category.description",
            "description": "<p>Description of the Category.</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "Category"
  },
  {
    "type": "get",
    "url": "/posts",
    "title": "Request Posts",
    "version": "1.0.0",
    "group": "Post",
    "name": "GetPost",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "category",
            "description": "<p>Optional Category Id or slug.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "offset",
            "description": "<p>Optional Offset of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "limit",
            "description": "<p>Optional Limit of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "query",
            "description": "<p>Optional Query string.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "posts",
            "description": "<p>List of posts.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.id",
            "description": "<p>Id of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.title",
            "description": "<p>Title of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.subtitle",
            "description": "<p>Subtitle of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.content",
            "description": "<p>Content of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "post.category",
            "description": "<p>Category of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.category.id",
            "description": "<p>Id of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.category.title",
            "description": "<p>Title of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.category.sluged_title",
            "description": "<p>Sluged Title of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.category.description",
            "description": "<p>Description of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "post.created_at",
            "description": "<p>Date and time of the creation of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "post.updated_at",
            "description": "<p>Date and time of the last update of the Post.</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "Post"
  },
  {
    "type": "get",
    "url": "/posts/:id",
    "title": "Request Post By Id",
    "version": "1.0.0",
    "group": "Post",
    "name": "GetPostByIdOrSlug",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>Post Id or slug.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Id of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>Title of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "subtitle",
            "description": "<p>Subtitle of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>Content of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "post.category",
            "description": "<p>Category of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.category.id",
            "description": "<p>Id of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.category.title",
            "description": "<p>Title of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.category.sluged_title",
            "description": "<p>Sluged Title of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.category.description",
            "description": "<p>Description of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "created_at",
            "description": "<p>Date and time of the creation of the Post.</p>"
          },
          {
            "group": "Success 200",
            "type": "DateTime",
            "optional": false,
            "field": "updated_at",
            "description": "<p>Date and time of the last update of the Post.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "DateTime",
            "optional": false,
            "field": "error",
            "description": "<p>Description of the error.</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "Post"
  },
  {
    "type": "get",
    "url": "/posts/:id/comments",
    "title": "Request Post Comments",
    "version": "1.0.0",
    "group": "Post",
    "name": "GetPostComments",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "offset",
            "description": "<p>Optional Offset of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "limit",
            "description": "<p>Optional Limit of results.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "comments",
            "description": "<p>List of comment.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment.id",
            "description": "<p>Id of the comment.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment.author",
            "description": "<p>Author of the comment.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment.text",
            "description": "<p>Text of the comment.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "comment.created_at",
            "description": "<p>Date of the comment.</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "Post"
  },
  {
    "type": "post",
    "url": "/posts/:id/comments",
    "title": "Create Post Comments",
    "version": "1.0.0",
    "group": "Post",
    "name": "PostPostComments",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "author",
            "description": "<p>Author of the comment.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "text",
            "description": "<p>Text of the comment.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "postid",
            "description": "<p>Post Id of the comment.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "201": [
          {
            "group": "201",
            "type": "Sring",
            "optional": false,
            "field": "status",
            "description": "<p>Status.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "406": [
          {
            "group": "406",
            "type": "Array[]",
            "optional": false,
            "field": "errors",
            "description": "<p>Errors.</p>"
          },
          {
            "group": "406",
            "type": "String[]",
            "optional": false,
            "field": "errors.fieldName",
            "description": "<p>Errors for the field.</p>"
          }
        ]
      }
    },
    "filename": "routes/api.php",
    "groupTitle": "Post"
  }
] });
