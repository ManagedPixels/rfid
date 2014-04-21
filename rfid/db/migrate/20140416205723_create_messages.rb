class CreateMessages < ActiveRecord::Migration
  def change
    create_table :messages do |t|
      t.references :attendee, index: true
      t.text :message

      t.timestamps
    end
  end
end
