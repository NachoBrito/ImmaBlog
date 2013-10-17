<?php

namespace NachoBrito\ThoughtsBundle\Controller\API;

use FOS\RestBundle\Routing\ClassResourceInterface;

/**
 * Description of ThoughtController
 * @RouteResource("Thought")
 * @author nacho
 */
class ThoughtController implements ClassResourceInterface
{

    public function optionsAction()
    {
        
    }
 
// "options_users" [OPTIONS] /users

    public function cgetAction()
    {
        
    }

// "get_users"     [GET] /users

    public function newAction()
    {
        
    }

// "new_users"     [GET] /users/new

    public function postAction()
    {
        
    }

// "post_users"    [POST] /users

    public function cpatchAction()
    {
        
    }

// "patch_users"   [PATCH] /users

    public function getAction($slug)
    {
        
    }

// "get_user"      [GET] /users/{slug}

    public function editAction($slug)
    {
        
    }

// "edit_user"     [GET] /users/{slug}/edit

    public function putAction($slug)
    {
        
    }

// "put_user"      [PUT] /users/{slug}

    public function patchAction($slug)
    {
        
    }

// "patch_user"    [PATCH] /users/{slug}

    public function lockAction($slug)
    {
        
    }

// "lock_user"     [PATCH] /users/{slug}/lock

    public function banAction($slug)
    {
        
    }

// "ban_user"      [PATCH] /users/{slug}/ban

    public function removeAction($slug)
    {
        
    }

// "remove_user"   [GET] /users/{slug}/remove

    public function deleteAction($slug)
    {
        
    }

// "delete_user"   [DELETE] /users/{slug}

    public function getUserCommentsAction($slug)
    {
        
    }

// "get_user_comments"    [GET] /users/{slug}/comments

    public function newUserCommentsAction($slug)
    {
        
    }

// "new_user_comments"    [GET] /users/{slug}/comments/new

    public function postUserCommentsAction($slug)
    {
        
    }

// "post_user_comments"   [POST] /users/{slug}/comments

    public function getUserCommentAction($slug, $id)
    {
        
    }

// "get_user_comment"     [GET] /users/{slug}/comments/{id}

    public function editUserCommentAction($slug, $id)
    {
        
    }

// "edit_user_comment"    [GET] /users/{slug}/comments/{id}/edit

    public function putUserCommentAction($slug, $id)
    {
        
    }

// "put_user_comment"     [PUT] /users/{slug}/comments/{id}

    public function postUserCommentVoteAction($slug, $id)
    {
        
    }

// "post_user_comment_vote" [POST] /users/{slug}/comments/{id}/vote

    public function removeUserCommentAction($slug, $id)
    {
        
    }

// "remove_user_comment"  [GET] /users/{slug}/comments/{id}/remove

    public function deleteUserCommentAction($slug, $id)
    {
        
    }

// "delete_user_comment"  [DELETE] /users/{slug}/comments/{id}

    public function linkAction($slug)
    {
        
    }

// "link_user_friend"     [LINK] /users/{slug}

    public function unlinkAction($slug)
    {
        
    }

// "link_user_friend"     [UNLINK] /users/{slug}
}
