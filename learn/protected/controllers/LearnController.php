<?php

class LearnController extends Controller
{
	public $layout='column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	/* 
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	*/
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('train','index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
        echo "i am in the view";;
        exit();
		$post=$this->loadModel();
		$comment=$this->newComment($post);

		$this->render('view',array(
			'model'=>$post,
			'comment'=>$comment,
		));
	}
    
	/**
	 * Displays a particular model.
	 */
	public function actionEvaluate()
	{

        /*exit();*/
        if(isset($_POST['Learn']))
		{
			$model->attributes=$_POST['Learn'];
			if($model->save())
                $this->redirect(array('view','id'=>$model->id));
		}

        // exit();
		$this->layout='learn';
		$this->render('evaluate',array()); 		
		
		/*
		$post=$this->loadModel();
		$comment=$this->newComment($post);

		$this->render('view',array(
			'model'=>$post,
			'comment'=>$comment,
		));
		*/
	}
    
    
    	/**
	 * Displays a particular model.
	 */
	public function actionConfirmation()
	{
        echo "i am in the Cview";;
        exit();
        
    }
    
    	/**
	 * Displays a particular model.
	 */
	public function actionRegistration()
	{
		$this->render('registration',array());   
        exit();
    }
    
    	/**
	 * Displays a particular model.
	 */
	public function actionResult()
	{
        /*
        echo "i am in the result page ";
        print("<pre>");
        print_r($_POST['Learn']);
        print("</pre>");        
        */
        $score = 0;
        foreach( $_POST['Learn'] as $key => $value ) {
            switch($value){
                case "0":                    
                break;
                case "1" :
                $score++;
                break;
            }
        }
        
        if($score>=3){
            $this->render('result',array());   
        }
        else{
            $this->render('fail',array());               
        }
        exit();
    }
        
    
        	/**
	 * Displays a particular model.
	 */
	public function actionLinkedin()
	{
        echo "i am in the Lview";;
        exit();        
    }
    
    
        	/**
	 * Displays a particular model.
	 */
	public function actionEnroll()
	{
        echo "i am in the Enrollview";;
        exit();
        
    }
    
    
        	/**
	 * Displays a particular model.
	 */
	public function actionAllotment()
	{
        echo "i am in the Allotment view";;
        exit();
        
    }
        
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionTrain($uid = 12)
	{
        echo "hi ia m here";
		//$user=User::model()->findByPk($uid);
        $this->redirect(array('view'));
        $this->redirect(array('view','id'=>$model->id));
        exit();
        
		print_r($user);exit;
		
		if(isset($_POST['Learn']))
		{
			$model->attributes=$_POST['Learn'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('becometrainer',array(
			'model'=>$model,
		));
	}

	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Learn;
		if(isset($_POST['Learn']))
		{
			$model->attributes=$_POST['Learn'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['Learn']))
		{
			$model->attributes=$_POST['Learn'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//echo "Action Index";
		$this->layout='trainlearn';
		/*
		$criteria=new CDbCriteria(array(
			'condition'=>'status='.Learn::STATUS_PUBLISHED,
			'order'=>'update_time DESC',
			'with'=>'commentCount',
		));
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);

		$dataProvider=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		
		
		//print_r($_POST);exit;
		
		if(isset($_POST['Learn']))
		{
			//$model->attributes=$_POST['Learn'];
			//if($model->save())
			$this->redirect("?r=learn/evaluate");
		}
		
		
		$this->render('index',array(

		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Suggests tags based on the current user input.
	 * This is called via AJAX when the user is entering the tags input.
	 */
	public function actionSuggestTags()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$tags=Tag::model()->suggestTags($keyword);
			if($tags!==array())
				echo implode("\n",$tags);
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				if(Yii::app()->user->isGuest)
					$condition='status='.Learn::STATUS_PUBLISHED.' OR status='.Learn::STATUS_ARCHIVED;
				else
					$condition='';
				$this->_model=Learn::model()->findByPk($_GET['id'], $condition);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Creates a new comment.
	 * This method attempts to create a new comment based on the user input.
	 * If the comment is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comment the comment instance
	 */
	protected function newComment($post)
	{
		$comment=new Comment;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}
}
